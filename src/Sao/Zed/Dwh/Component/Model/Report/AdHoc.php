<?php

class Sao_Zed_Dwh_Component_Model_Report_AdHoc extends Sao_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * Returns a title for the report, e.g. "Top 50 Products today"
     * @return string
     */
    public function getName()
    {
        return 'AdHoc query';
    }

    /**
     * Returns a string id that can be used as an url key, e.g. "top-50-products-today"
     * @return string
     */
    public function getId()
    {
        return 'ad-hoc';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array('query-1' => '', 'query-1-initially' => '
SELECT Descendants(Head([Date by week reversed].[Week].Members,3))
    ON COLUMNS,
[Measures].[# Orders]
    ON ROWS
FROM [Sales]',
            'query-2' => '', 'query-2-initially' => '
SELECT NON EMPTY Tail([Date by month].[Day].Members,8)
    ON COLUMNS,

[Measures].[# Orders] ON ROWS
FROM [Sales]
');
    }

    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        // $this->flushCubesCachesForProfiling();
        $query1 = $this->getParamValue('query-1');
        $query2 = $this->getParamValue('query-2');

        $this->startBlock()->addHtml('<p>Table query</p><textarea name="query-1" style="font-family: monospace" rows="15" cols="70">'
            . ($query1 ? : $this->getParamValue('query-1-initially'))
            . '</textarea><br/><input style="margin-bottom:30px" type="submit" value="run"/>')->finishBlock();


        if ($query1) {
            $this->startBlock()->addHtml('<p>Table</p>')->addTable($this->getParamValue('query-1'))->finishBlock();
        }


        $this->startBlock()->addHtml('<p>Chart query</p><textarea name="query-2" style="font-family: monospace" rows="15" cols="70">'
            . ($query2 ? : $this->getParamValue('query-2-initially'))
            . '</textarea><br/><input style="margin-bottom:30px" type="submit" value="run"/>')->finishBlock();

        if ($query2) {
            $this->startBlock()->addHtml('<p>Chart</p>')->addLineChart($query2)->finishBlock();
        }
    }
}