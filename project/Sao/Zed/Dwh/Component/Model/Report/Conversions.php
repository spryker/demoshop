<?php

class Sao_Zed_Dwh_Component_Model_Report_Conversions extends Sao_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * Returns a title for the report, e.g. "Top 50 Products today"
     * @return string
     */
    public function getName()
    {
        return 'Conversions';
    }

    /**
     * Returns a string id that can be used as an url key, e.g. "top-50-products-today"
     * @return string
     */
    public function getId()
    {
        return 'conversions';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'time-units' => 7, 'time-unit' => 'Days', 'time-upto' => 1,
            'sort-measure' => '# Orders',
            'measures' => array('[Measures].[# Campaign clicks]',
                '[Measures].[# New visitors]',
                '[Measures].[# Registrations]',
//                '[Measures].[# Leads]',
                '[Measures].[# First orders]',
                '[Measures].[# Orders]',
                '[Measures].[Net order revenue]'
            )
        );
    }


    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        $this->startFilterBlock()->addTimeSelection('Conversions')->addHtml(', ordered by ')
            ->addMeasuresSelect('sort-measure', 'Conversions')->finishBlock();

        $this->startBlock('width:100%;')->addHtml('<p>Conversions in time span, per channel and publication, attributed with the &quot;Project-A&quot; performance attribution model</p>')->addTable('
SELECT {' . implode(',
        ', $this->getParamValue('measures')) . '}
ON COLUMNS,

NON EMPTY Order([Channel].[Channel].Members,
                [Measures].[' . $this->getParamValue('sort-measure') . '],
                desc) *
          Order(Generate( [Campaign category].[Publication or Adwords Campaign].Members,
                         {[Campaign category].[Publication or Adwords Campaign].CurrentMember,
                          [Campaign category].[Publication or Adwords Campaign].CurrentMember.Parent,
                          [Campaign category].[Publication or Adwords Campaign].CurrentMember.Parent.Parent}),
                [Measures].[' . $this->getParamValue('sort-measure') . '],
                desc)
    ON ROWS

FROM [Conversions]

WHERE {' . implode(',
       ', $this->getTimeExpressionForFilter('Conversions')) . '}
')->finishBlock();


        foreach (array('# Registrations', '# First orders', '# Orders') as $measure) {
            $this->startBlock()->addHtml('<p>Attributed ' . $measure . ' per channel</p>')
                ->addLineChart('
SELECT ' . $this->getTimeExpressionForChart() . '
    ON COLUMNS,
NON EMPTY Order([Channel].[Channel].Members,
                [Measures].[' . $measure . '],
                desc)
    ON ROWS
FROM [Conversions]
WHERE [Measures].[' . $measure . ']', 500, 200, true)
                ->finishBlock();
        }

        $this->addMeasuresSelection('measures', 'Conversions');
    }
}
