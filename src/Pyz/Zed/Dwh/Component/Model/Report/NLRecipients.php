<?php

class Pyz_Zed_Dwh_Component_Model_Report_NLRecipients extends Pyz_Zed_Dwh_Component_Model_Report_Abstract
{
    /**
     * Returns a title for the report, e.g. "Top 50 Products today"
     * @return string
     */
    public function getName()
    {
        return 'NL Recipients';
    }

    /**
     * Returns a string id that can be used as an url key, e.g. "top-50-products-today"
     * @return string
     */
    public function getId()
    {
        return 'nl-recipients';
    }

    /**
     * Returns the names of all report parameters with their default values ('key' => 'value')
     * @return array
     */
    protected function getParamDefaults()
    {
        return array(
            'time-units' => 3, 'time-unit' => 'Months', 'time-upto' => 0,
            'time-perspective' => 'Sent',
            'sort-measure' => '# Confirmations',
            'measures' => array(
                '[Measures].[# Active recipients]',
                '[Measures].[# Confirmations]',
            ),
        );
    }

    /**
     * Executes all queries and processes the result by calling functions of the parent class
     * @param array $params A list of report parameters (key => value)
     */
    protected function run($params)
    {
        $this->startFilterBlock()
            ->addTimeSelection('NL Recipients')
            ->finishBlock();

        // ----------------------------------------------------------------------------------------
        $this->startBlock()
            ->addHtml('<p>Active recipients</p>')
            ->addLineChart('
SELECT NON EMPTY ' . $this->getTimeExpressionForTableAxis() . '
    ON COLUMNS,

NON EMPTY {' . implode(',
           ', $this->getParamValue('measures')) . '}
    ON ROWS

FROM [NL Recipients]
')->finishBlock();

        // ----------------------------------------------------------------------------------------
        $this->startBlock()
            ->addHtml('<p>Number of subscriptions per recipient</p>')
            ->addColumnChart('
SELECT [Subscriptions].[Subscriptions].Members
    ON COLUMNS,

NON EMPTY {[Measures].[# Active recipients]}
    ON ROWS

FROM [NL Recipients]')->finishBlock();

        // ----------------------------------------------------------------------------------------

        $this->startBlock()
            ->addHtml('<p>Newsletter subscriptions by location</p>')
            ->addTable('
SELECT

Order(Generate(TopCount ([Location].[Region].Members,
                         20,
                         [Measures].[# Confirmations]),
               {[Location].[Region].CurrentMember,
                [Location].[Region].CurrentMember.Parent}),
      [Measures].[# Confirmations],
      desc)

    ON ROWS,

NON EMPTY {[Measures].[# Confirmations]} ON COLUMNS

FROM [NL Recipients]

WHERE {' . implode(',
       ', $this->getTimeExpressionForFilter('NL Recipients')) . '}', true)->finishBlock();

        // ----------------------------------------------------------------------------------------
        $this->startBlock()
            ->addHtml('<p>Recipient location (without recipients with unknown location)</p>')
            ->addMap('
WITH MEMBER [Measures].[Latitude]
     AS [Recipient].currentmember.properties("Latitude")

     MEMBER [Measures].[Longitude]
     AS [Recipient].currentmember.properties("Longitude")

     MEMBER [Measures].[Name]
     AS [Recipient].currentmember.properties("First name")
        || " " ||
        [Recipient].currentmember.properties("Last name")

SELECT NON EMPTY {[Measures].[Latitude],
                  [Measures].[Longitude],
                  [Measures].[Name],
                  [Measures].[# Confirmations]}
    ON COLUMNS,

NON EMPTY [Recipient].[E-Mail].Members
    ON ROWS

FROM [NL Recipients]

WHERE {' . implode(',
       ', $this->getTimeExpressionForFilter('NL Recipients')) . '}
', 700, 700)->finishBlock();

        $this->addMeasuresSelection('measures', 'NL Recipients', 'Measures');
    }
}
