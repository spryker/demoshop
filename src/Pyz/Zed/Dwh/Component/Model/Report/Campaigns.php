<?php

class Pyz_Zed_Dwh_Component_Model_Report_Campaigns extends Pyz_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * Returns a title for the report, e.g. "Top 50 Products today"
     * @return string
     */
    public function getName()
    {
        return 'Campaigns';
    }

    /**
     * Returns a string id that can be used as an url key, e.g. "top-50-products-today"
     * @return string
     */
    public function getId()
    {
        return 'campaigns';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'time-units' => 1, 'time-unit' => 'Weeks', 'time-upto' => 1,
            'time-perspective' => 'Click',
            'performance-attribution-model' => 'Project-A',
            'sort-measure' => '# Orders',
            'top-campaigns' => 20, 'top-adgroups' => 20,

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
        $timeMembers = $this->factory->createModelSchemaProcessor()->getLevelMembers('Campaign clicks', $this->getTimeLevel());
        $timeList = array_map(function ($elem) {
            return $elem['MEMBER_NAME'];
        }, $timeMembers);

        $this->startFilterBlock()
            ->addSelect('time-unit',
                array('Days' => 'Day',
                    'Weeks' => 'Week',
                    'Months' => 'Month',
                    'Quarters' => 'Quarter',
                    'Years' => 'Year'))
            ->addHtml(': ')
            ->addSelect('time-upto', array_reverse($timeList), true)
            ->addHtml(', time perspective ')
            ->addLevelMemberSelect('time-perspective', 'Campaign clicks', '[Time perspective].[Time perspective]')
            ->addHtml(', performance attribution model ')
            ->addLevelMemberSelect('performance-attribution-model', 'Campaign clicks', '[Performance attribution model].[Model]')
            ->addHtml(', ordered by ')->addMeasuresSelect('sort-measure', 'Conversions')
            ->finishBlock();

        $this->startBlock()
            ->addHtml('<p>Top ')->addNumberSelect('top-campaigns', 20, 1000, 10)
            ->addHtml(' campaigns and adgroups by channel</p>')
            ->addTable('
SELECT {' . implode(',
        ', $this->getParamValue('measures')) . '}
    ON COLUMNS,

NON EMPTY Order(TopCount([Campaign category].[Partner or Adwords Account].Members,
                         ' . $this->getParamValue('top-campaigns') . ',
                         [Measures].[' . $this->getParamValue('sort-measure') . '])
                    * [Channel].[Channel].Members,
                [Measures].[' . $this->getParamValue('sort-measure') . '],
                desc)
    ON ROWS

FROM [Campaign clicks]

WHERE {' . implode(',
       ', $this->getTimeExpressionForFilter('Campaign clicks')) . '}
')->finishBlock();

        $this->startBlock()
            ->addHtml('<p>Top ')->addNumberSelect('top-adgroups', 10, 500, 10)->addHtml(' campaigns and adgroups</p>')
            ->addTable('
SELECT {' . implode(',
        ', $this->getParamValue('measures')) . '}
    ON COLUMNS,

NON EMPTY Order(Generate(Order(TopCount([Campaign category].[WMC or Adwords Adgroup].Members,
                                        ' . $this->getParamValue('top-adgroups') . ',
                               [Measures].[' . $this->getParamValue('sort-measure') . ']),
                         [Measures].[' . $this->getParamValue('sort-measure') . '],
                         desc),
                         {[Campaign category].[Publication or Adwords Campaign].CurrentMember,
                          [Campaign category].[Publication or Adwords Campaign].CurrentMember.Parent,
                          [Campaign category].[Publication or Adwords Campaign].CurrentMember.Parent.Parent}),
                [Measures].[' . $this->getParamValue('sort-measure') . '],
                desc)

    ON ROWS

FROM [Campaign clicks]

WHERE CrossJoin ({CrossJoin({[Time perspective].[' . $this->getParamValue('time-perspective') . ']},
                            {[Performance attribution model].[' . $this->getParamValue('performance-attribution-model') . ']})},
                 {' . implode(',
       ', $this->getTimeExpressionForFilter('Campaign clicks')) . '})
', true)->finishBlock();

        $this->addMeasuresSelection('measures', 'Campaign clicks');
    }
}
