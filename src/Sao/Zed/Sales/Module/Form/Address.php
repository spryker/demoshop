<?php

class Sao_Zed_Sales_Module_Form_Address extends Zend_Form
{
    public function init()
    {

        $firstName = new ProjectA_Zed_Library_Form_Element_Text('first_name');
        $firstName->setLabel('First Name')
            ->setRequired(true);

        $lastName = new ProjectA_Zed_Library_Form_Element_Text('last_name');
        $lastName->setLabel('Last Name')
            ->setRequired(true);

        $address1 = new ProjectA_Zed_Library_Form_Element_Text('address1');
        $address1->setLabel('Address 1')
            ->setRequired(true);

        $address2 = new ProjectA_Zed_Library_Form_Element_Text('address2');
        $address2->setLabel('Address 2');

        $city = new ProjectA_Zed_Library_Form_Element_Text('city');
        $city->setLabel('City')
            ->setRequired(true);

        $zipcode = new ProjectA_Zed_Library_Form_Element_Text('zip_code');
        $zipcode->setLabel('Zip code')
            ->setRequired(false);

        $miscCountry = new ProjectA_Zed_Library_Form_Element_Select('fk_misc_country');
        $miscCountry->setLabel('Country');
        $miscCountry->setMultiOptions($this->getCountries());

        $region = new ProjectA_Zed_Library_Form_Element_Select('region');
        $region->setLabel('Region');
        $region->setMultiOptions($this->getRegionOptions());

        $cellPhone = new ProjectA_Zed_Library_Form_Element_Text('cell_phone');
        $cellPhone->setLabel('Cellular Phone');

        $submit = new ProjectA_Zed_Library_Form_Element_Submit('submit');

        $this->addElements(array($firstName, $lastName, $address1, $address2, $city, $zipcode, $miscCountry, $region, $cellPhone, $submit));
    }

    protected function getCountries()
    {
        $countries = ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery::create()->orderByName()->find();

        return ProjectA_Zed_Library_Form_Helper::collectionToOptionArray($countries, 'name');
    }

    protected function getRegionOptions()
    {
        $array = ['' => ''];

        $regionCollection = Sao_Zed_Misc_Persistence_SaoMiscRegionQuery::create()
            ->orderByName()
            ->useCountryQuery()->orderByName(Criteria::ASC)->endUse()
            ->find();
        /** @var $regionEntity Sao_Zed_Misc_Persistence_SaoMiscRegion */

        foreach ($regionCollection AS $regionEntity) {
            $array[$regionEntity->getCountry()->getName()][$regionEntity->getIdRegion()] = $regionEntity->getName();
        }

        return $array;
    }

}
