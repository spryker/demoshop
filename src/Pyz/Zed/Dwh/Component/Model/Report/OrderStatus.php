<?php

class Pyz_Zed_Dwh_Component_Model_Report_OrderStatus extends Pyz_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Order status';
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'order-status';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'time-units' => 3, 'time-dimension' => 'Weeks', 'time-unit' => 'Weeks', 'time-upto' => 0,
            'perspective' => 'Sales', 'date-perspective' => 'Event date',
            'sales-measures' => array('[Measures].[# Orders]',
                '[Measures].[# Orders]',
                '[Measures].[Gross revenue (after vouchers)]',
              /*'[Measures].[Gross margin]'*/),
            'sales-events-measures' => array('[Measures].[# Effected items]',
                '[Measures].[# Effected items]',
                '[Measures].[Avg time since order]',
                '[Measures].[Avg time since last event]',
                '[Measures].[Avg time to next event]'));
    }

    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        $this->startFilterBlock()
            ->addTimeSelection("Sales")
            ->addHtml(', perspective ')
            ->addLevelMemberSelect('perspective', 'Sales', '[Order item status perspective].[Perspective]')
            ->finishBlock();

        $this->startBlock()->addHtml('<p>Current status by order date</p>')
            ->addTable('
SELECT ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,
NON EMPTY {' . implode(',
           ', $this->getParamValue('sales-measures')) . '} *
          Descendants([Order item status].[Group].Members)
    ON ROWS
FROM [Sales]
WHERE [Order item status perspective].[' . $this->getParamValue('perspective') . ']
')->finishBlock();

        $this->startBlock()->addHtml('<p>% Orders</p>')
            ->addLineChart('
WITH
    MEMBER [Measures].[% Orders]
    AS [Measures].[# Orders]
         / Aggregate([Order item status].[All statuses],
                     [Measures].[# Orders]),
       format_string="#0%"

SELECT ' . $this->getTimeExpressionForChart() .'
    ON COLUMNS,
NON EMPTY Order([Order item status].[Group].Members,
                [Measures].[% Orders],
                desc)
    ON ROWS
FROM [Sales]
WHERE [Order item status perspective].[' . $this->getParamValue('perspective') . '] *
      [Measures].[% Orders]
', 600, 400, true)->finishBlock();

        $this->startBlock()->addHtml('<p>Events by ')
            ->addLevelMemberSelect('date-perspective', 'Sales events', '[Date perspective].[Date perspective]')
            ->addHtml(' date</p>')->addTable('
SELECT ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,
NON EMPTY {' . implode(',
           ', $this->getParamValue('sales-events-measures')) . '} *
          [Event].[Event].Members
    ON ROWS
FROM [Sales events]

WHERE [Event perspective].[' . $this->getParamValue('perspective') . '] *
      [Date perspective].[' . $this->getParamValue('date-perspective') . '] *
      [Duration perspective].[Time since last event]
')->finishBlock();

        $this->startBlock()->addHtml('<p># Effected items</p>')
            ->addLineChart('
SELECT ' . $this->getTimeExpressionForChart() .'
    ON COLUMNS,
NON EMPTY Order([Event].[Event].Members,
                [Measures].[# Effected items],
                desc)
    ON ROWS
FROM [Sales events]

WHERE [Event perspective].[' . $this->getParamValue('perspective') . '] *
      [Date perspective].[' . $this->getParamValue('date-perspective') . '] *
      [Duration perspective].[Time since last event] *
      [Measures].[# Effected items]
', 600, 400)->finishBlock();

        $this->addMeasuresSelection('sales-measures', 'Sales');
        $this->addMeasuresSelection('sales-events-measures', 'Sales events');
    }
}
