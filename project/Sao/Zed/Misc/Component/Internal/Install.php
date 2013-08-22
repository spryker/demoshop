<?php

class Sao_Zed_Misc_Component_Internal_Install extends ProjectA_Zed_Misc_Component_Internal_Install implements ProjectA_Zed_Library_Component_Interface_InstallInterface, ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Sao_Zed_Fulfillment_Component_Factory
     */
    protected $factory;

    /**
     * @return bool
     */
    public function isActive()
    {
        return true;
    }

    /**
     *
     */
    public function install()
    {
        parent::install();

        $this->installUsStates();
        $this->installCanadianProvinces();
    }

    protected function installUsStates()
    {


        $states = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
        ];
        $this->arrayToDatabase($states, 'US');
    }

    protected function installCanadianProvinces()
    {
        $states = [
            'ON' => 'Ontario',
            'QC' => 'Quebec',
            'NS' => 'Nova Scotia',
            'NB' => 'New Brunswick',
            'MB' => 'Manitoba',
            'BC' => 'British Colombia',
            'PE' => 'Prince Edward Island',
            'SK' => 'Saskatchewan',
            'AB' => 'Alberta',
            'NL' => 'Newfoundland and Labrador',
            'NT' => 'Northwest Territories',
            'NU' => 'Nunavut',
            'YT' => 'Yukon Territory',
        ];

        $this->arrayToDatabase($states, 'CA');
    }

    protected function arrayToDatabase(array $array, $iso2)
    {
        $country = ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery::create()->findOneByIso2Code($iso2);

        foreach ($array AS $short_name => $name) {
            $entityState = Sao_Zed_Misc_Persistence_SaoMiscRegionQuery::create()->filterByShortName($short_name)->filterByCountry($country)->findOneOrCreate();
            if ($entityState->isNew()) {
                $entityState->setName($name);
                $entityState->save();
            }
        }
    }
}
