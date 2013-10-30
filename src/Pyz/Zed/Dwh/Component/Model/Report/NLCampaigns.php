<?php

class Pyz_Zed_Dwh_Component_Model_Report_NLCampaigns extends Pyz_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * Returns a title for the report, e.g. "Top 50 Products today"
     * @return string
     */
    public function getName()
    {
        return 'NL Campaigns';
    }

    /**
     * Returns a string id that can be used as an url key, e.g. "top-50-products-today"
     * @return string
     */
    public function getId()
    {
        return 'nl-campaigns';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'time-units' => 1, 'time-unit' => 'Months', 'time-upto' => 0,
            'time-perspective' => 'Sent',
            'sort-measure' => '# Emails sent',
            'measures' => array(
                '[Measures].[# Emails sent]',
                '[Measures].[# Unique opens]',
                '[Measures].[Open rate]',
                '[Measures].[# Unique Clicks]',
                '[Measures].[Click rate]')
        );
    }

    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        $timeMembers = $this->factory->getModelSchema()->getLevelMembers('NL Campaigns', $this->getTimeLevel());
        $timeList = array_map(function ($elem) { return $elem['MEMBER_NAME']; }, $timeMembers);

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
            ->addLevelMemberSelect('time-perspective', 'NL Campaigns', '[Time perspective].[Time perspective]')
            ->addHtml(', sort measure ')->addMeasuresSelect('sort-measure', 'NL Campaigns')
            ->finishBlock();

        $this->startBlock()
            ->addHtml('<p>Newsletter campaigns</p>')
            ->addTable('
SELECT {' . implode(',
        ', $this->getParamValue('measures')) . '}
    ON COLUMNS,

NON EMPTY Order({[Email List].[List title].Members * [Email Campaign].[Campaign title].Members},
                [Measures].[' . $this->getParamValue('sort-measure') . '],
                DESC)
    ON ROWS

FROM [NL Campaigns]

WHERE {[Time perspective].[' . $this->getParamValue('time-perspective') . ']} *
      {' . implode(',
       ', $this->getTimeExpressionForFilter('NL Campaigns')) . '}', true)
            ->finishBlock();

        $this->startBlock()
            ->addHtml('<p>List subscribers</p>')
            ->addTable('
SELECT NON EMPTY [Email List].[List title].Members
    ON COLUMNS,

NON EMPTY {[Measures].[# Subscriptions],
           [Measures].[# Unsubscriptions],
           [Measures].[# Subscribers]}
     ON ROWS

FROM [NL Campaigns]

WHERE {[Time perspective].[' . $this->getParamValue('time-perspective') . ']} *
      {' . implode(',
       ', $this->getTimeExpressionForFilter('NL Campaigns')) . '}', true)->finishBlock();

        $this->addMeasuresSelection('measures', 'NL Campaigns');
    }
}
