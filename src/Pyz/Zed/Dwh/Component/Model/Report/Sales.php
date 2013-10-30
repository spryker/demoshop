<?php

class Pyz_Zed_Dwh_Component_Model_Report_Sales extends Pyz_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * Returns a title for the report, e.g. "Top 50 Products today"
     * @return string
     */
    public function getName()
    {
        return 'Sales';
    }

    /**
     * Returns a string id that can be used as an url key, e.g. "top-50-products-today"
     * @return string
     */
    public function getId()
    {
        return 'sales';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'time-units' => 3, 'time-unit' => 'Days', 'time-upto' => 0,
            'price-range-measure' => '# Orders',
            'substrate-measure' => '# Orders',
            'top-countries' => 10,
            'sales-measures' => array(
                '[Measures].[# Orders]',
                '[Measures].[# Sold items]',
                '[Measures].[Net item price]',
                '[Measures].[Avg net item price]',
                '[Measures].[Net revenue (after vouchers)]',
                '[Measures].[Avg net revenue per order]',
                '[Measures].[Net revenue after vouchers and operational cost]',
                '[Measures].[Gross revenue (after vouchers)]',
                '[Measures].[Avg gross revenue per order]',
            )
        );
    }

    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        $this->startFilterBlock()->addTimeSelection('Sales')->finishBlock();

        $this->startBlock()->addHtml('<p>Sales</p>')
            ->addTable('

SELECT ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,
NON EMPTY Descendants([Order item status].[All Statuses]) *
          {' . implode(',
           ', $this->getParamValue('sales-measures')) . '}
    ON ROWS
FROM [Sales]
', false)->finishBlock();

        $this->startBlock()->addHtml('<p>Orders</p>')
            ->addLineChart('
SELECT ' . $this->getTimeExpressionForChart() . '
    ON COLUMNS,
NON EMPTY [Measures].[# Orders]
    ON ROWS
FROM [Sales]')->finishBlock();

        $this->startBlock()->addHtml('<p>Revenue</p>')
            ->addLineChart('
SELECT ' . $this->getTimeExpressionForChart() . '
    ON COLUMNS,
NON EMPTY {[Measures].[Net item price],
           [Measures].[Net revenue (after vouchers)]}
    ON ROWS
FROM [Sales]')->finishBlock();

        $this->startBlock()->addHtml('<p>Payment split</p>')->addTable('
WITH
    MEMBER [Measures].[% Orders]
    AS [Measures].[# Orders]
         / Aggregate([Payment method].[All payment methods],
                     [Measures].[# Orders]),
       format_string="#0%"

SELECT ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,
NON EMPTY [Payment method].[Payment method].Members
    ON ROWS
FROM [Sales]
WHERE [Measures].[% Orders]
        ')->finishBlock();

        $this->startBlock()->addHtml('<p>')->addMeasuresSelect('price-range-measure', 'Sales')
            ->addHtml(' by price range</p>')->addTable('
SELECT ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,
[Price range].[Price range].Members
    ON ROWS
FROM [Sales]
WHERE [Measures].[' . $this->getParamValue('price-range-measure') . ']
        ')->finishBlock();

        $this->startBlock()->addHtml('<p>')->addMeasuresSelect('substrate-measure', 'Sales')
            ->addHtml(' by substrate</p>')->addTable('
SELECT ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,
NON EMPTY [Substrate].[Substrate].Members
    ON ROWS
FROM [Sales]
WHERE [Measures].[' . $this->getParamValue('substrate-measure') . ']
        ')->finishBlock();

        $this->startBlock()->addHtml('<p>Top ')->addNumberSelect('top-countries', 5, 200, 5)
            ->addHtml(' countries (shipping address)</p>')
            ->addTable('
SELECT NON EMPTY {[Measures].[# Orders],
                  [Measures].[Gross revenue (after vouchers)]}
    ON COLUMNS,

Order(TopCount ([Shipping country].[Country].Members,
                ' . $this->getParamValue('top-countries') . ',
                [Measures].[# Orders]),
      [Measures].[# Orders],
      desc)
    ON ROWS
FROM [Sales]
WHERE {' . implode(',
       ', $this->getTimeExpressionForFilter('Sales')) . '}')->finishBlock();

        $this->addMeasuresSelection('sales-measures', 'Sales');

    }
}
