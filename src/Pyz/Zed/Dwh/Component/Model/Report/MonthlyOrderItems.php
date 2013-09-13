<?php

class Pyz_Zed_Dwh_Component_Model_Report_MonthlyOrderItems extends Pyz_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Monthly order items';
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'monthly-order-items';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'month' => 1, 'time-perspective' => 'Booked',

            'sales-measures' => array(
                '[Measures].[Net item price]',
                '[Measures].[Net option price]',
                '[Measures].[Net shipping revenue]',
                '[Measures].[Net voucher cost]',
                '[Measures].[Net revenue (after vouchers)]',
                '[Measures].[VAT amount]',
                '[Measures].[Duties amount]',
                '[Measures].[Gross revenue (after vouchers)]',
                '[Measures].[Net voucher amount artist share]',

            )
        );
    }

    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        $timeMembers = $this->factory->getModelSchemaProcessor()->getLevelMembers('Sales', '[Date by month].[Month]');
        $timeList = array_map(function ($elem) {
            return $elem['MEMBER_NAME'];
        }, $timeMembers);

        $month = current($this->getNLastLevelMembers($this->getParamValue('month') + 1, 'Sales', '[Date by month].[Month]'));

        $this->startFilterBlock()->addSelect('month', array_reverse($timeList), true)
            ->addHtml(', time perspective ')
            ->addLevelMemberSelect('time-perspective', 'Sales', '[Time perspective].[Perspective]')
            ->finishBlock();



        $this->startBlock()->addTable('
WITH
MEMBER [Measures].[SKU]
    AS IIF([Measures].[# Sold items] > 0,[Order item].[Item].CurrentMember.Properties("SKU"),Null)

MEMBER [Measures].[Artist ID]
    AS IIF([Measures].[# Sold items] > 0,[Order item].[Item].CurrentMember.Properties("Artist ID"),Null),
        FORMAT_STRING="###########"
MEMBER [Measures].[Artist name]
    AS IIF([Measures].[# Sold items] > 0,[Order item].[Item].CurrentMember.Properties("Artist name"),Null)

SELECT {[Measures].[SKU],
        [Measures].[Artist ID],
        [Measures].[Artist name],
        ' . implode(',
        ', $this->getParamValue('sales-measures')) . '}
    ON COLUMNS,

NON EMPTY
    ' . $month . '.Children *
     [Product category].[Category].Members *
     [Order item].[Item].Members

    ON ROWS FROM [Sales]
WHERE [Order item status perspective].[Perspective].[Sales] *
      [Time perspective].[' . $this->getParamValue('time-perspective') . ']'

        )->finishBlock();

        $this->addMeasuresSelection('sales-measures', 'Sales');
    }
}
