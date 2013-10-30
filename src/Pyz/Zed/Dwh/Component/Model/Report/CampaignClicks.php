<?php

class Pyz_Zed_Dwh_Component_Model_Report_CampaignClicks extends Pyz_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * Returns a title for the report, e.g. "Top 50 Products today"
     * @return string
     */
    public function getName()
    {
        return 'Campaign clicks';
    }

    /**
     * Returns a string id that can be used as an url key, e.g. "top-50-products-today"
     * @return string
     */
    public function getId()
    {
        return 'campaign-clicks';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'time-units' => 7, 'time-unit' => 'Days', 'time-upto' => 1,
            'time-perspective' => 'Click',
            'performance-attribution-model' => 'Project-A',
            'sort-measure' => '# Orders',

            'measures' => array('[Measures].[# Campaign clicks]',
                '[Measures].[# Unique visitors]',
                '[Measures].[# Visits]',
                '[Measures].[# Registrations]',
//                '[Measures].[# Leads]',
                '[Measures].[# First orders]',
                '[Measures].[# Orders]',
                '[Measures].[Net order revenue]',
//                '[Measures].[Direct cost of clicks]',
//                '[Measures].[Cost of campaigns without clicks]',
//                '[Measures].[Unmatched cost of clicks]',
                '[Measures].[Cost of clicks]',
            )
        );
    }

    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        $this->startFilterBlock()
            ->addTimeSelection('Campaign clicks')->addHtml(', time perspective ')
            ->addLevelMemberSelect('time-perspective', 'Campaign clicks', '[Time perspective].[Time perspective]')
            ->addHtml(', performance attribution model ')
            ->addLevelMemberSelect('performance-attribution-model', 'Campaign clicks', '[Performance attribution model].[Model]')
            ->addHtml(', ordered by ')->addMeasuresSelect('sort-measure', 'Conversions')
            ->finishBlock();

        $this->startBlock()
            ->addHtml('<p>Overview</p>')
            ->addTable('
SELECT ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,

{' . implode(',
 ', $this->getParamValue('measures')) . '} ON ROWS

FROM [Campaign clicks]

WHERE [Time perspective].[' . $this->getParamValue('time-perspective') . '] *
      [Performance attribution model].[' . $this->getParamValue('performance-attribution-model') . ']
', false)->finishBlock();

        $this->startBlock()->addHtml('<p>Traffic</p>')->addLineChart('
SELECT ' . $this->getTimeExpressionForChart() . '
    ON COLUMNS,

{[Measures].[# Campaign clicks],
 [Measures].[# Unique visitors]}
    ON ROWS

FROM [Campaign clicks]

WHERE [Time perspective].[' . $this->getParamValue('time-perspective') . '] *
      [Performance attribution model].[' . $this->getParamValue('performance-attribution-model') . ']
', 400, 200)->finishBlock();

        $this->startBlock()->addHtml('<p>Campaign clicks by channel and publication</p>')
            ->addTable('
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

FROM [Campaign clicks]

WHERE [Time perspective].[' . $this->getParamValue('time-perspective') . '] *
      [Performance attribution model].[' . $this->getParamValue('performance-attribution-model') . '] *
      {' . implode(',
       ', $this->getTimeExpressionForFilter('Campaign clicks')) . '}
')->finishBlock();

        $this->startBlock()->addHtml('<p>Percentage ' . $this->getParamValue('sort-measure') . ' by channel</p>')
            ->addLineChart('
WITH MEMBER [Measures].[% ' . $this->getParamValue('sort-measure') . ']
         AS [Measures].[' . $this->getParamValue('sort-measure') . ']
            / Sum([Channel].[All channels],
                  [Measures].[' . $this->getParamValue('sort-measure') . ']),
            format_string="#0%"

SELECT ' . $this->getTimeExpressionForChart() . '
     ON COLUMNS,

NON EMPTY Order([Channel].[Channel].Members,
                [Measures].[' . $this->getParamValue('sort-measure') . '], desc) ON ROWS

FROM [Campaign clicks]

WHERE [Time perspective].[' . $this->getParamValue('time-perspective') . '] *
      [Performance attribution model].[' . $this->getParamValue('performance-attribution-model') . '] *
      [Measures].[% ' . $this->getParamValue('sort-measure') . ']
', 400, 300, true)->finishBlock();

        $this->startBlock()->addHtml('<p>Brand / non brand</p>')->addTable('
SELECT {' . implode(',
        ', $this->getParamValue('measures')) . '}
ON COLUMNS,

NON EMPTY Order(Descendants([Channel].[All channels]),
                [Measures].[' . $this->getParamValue('sort-measure') . '],
                desc) *
          Order([Brand or non brand].[Brand or non brand].Members,
                [Measures].[' . $this->getParamValue('sort-measure') . '],
                desc)
    ON ROWS

FROM [Campaign clicks]

WHERE [Time perspective].[' . $this->getParamValue('time-perspective') . '] *
      [Performance attribution model].[' . $this->getParamValue('performance-attribution-model') . '] *
      {' . implode(',
       ',$this->getTimeExpressionForFilter('Campaign clicks')) . '}
')->finishBlock();

        $this->addMeasuresSelection('measures', 'Campaign clicks');
    }
}
