<?php

class Sao_Yves_Salesrule_Component_Model_Salesrule
{
    /**
     * @return int|null
     */
    public function getFreeShippingLimit()
    {
        $salesruleArr = $this->getSalesruleFromCache();
        $freeShippingSalesruleArr = $this->filterSalesruleToGetOnlyTheseWithFreeShipping($salesruleArr);
        $freeShippingLimit = $this->getLowestSalesruleLimit($freeShippingSalesruleArr);

        return $freeShippingLimit;
    }

    /**
     * @return array
     */
    protected function getSalesruleFromCache()
    {
        $salesruleSessionKey = ProjectA_Shared_Library_Storage::getSalesruleKey();
        $storage = Sao_Yves_Application_Component_Model_Factory::getStorage();

        $salesruleArr = array();
        if ($storage->isRegistered($salesruleSessionKey)) {
            $salesruleArr = $storage->get($salesruleSessionKey);
        }

        return $salesruleArr;
    }

    /**
     * @param $salesruleArr
     * @return array
     */
    public function filterSalesruleToGetOnlyTheseWithFreeShipping($salesruleArr)
    {
        $freeShippingSalesruleArr = array();
        foreach ($salesruleArr as $rule) {
            if ($this->isActionFreeShipping($rule['action']) && !$this->hasConditions($rule['conditions'])) {
                $freeShippingSalesruleArr[] = $rule;
            }
        }

        return $freeShippingSalesruleArr;
    }

    /**
     * @param $action
     * @return bool
     */
    public function isActionFreeShipping($action)
    {
        $isActionFreeShipping = false;

        if ('ActionFreeShipping' == $action) {
            $isActionFreeShipping = true;
        }

        return $isActionFreeShipping;
    }

    /**
     * @param $conditions
     * @return bool
     */
    public function hasConditions($conditions)
    {
        $hasConditions = false;

        if (is_array($conditions) && count($conditions) > 0) {
            $hasConditions = true;
        }

        return $hasConditions;
    }

    /**
     * @param $salesruleArr
     * @return int
     */
    protected function getLowestSalesruleLimit($salesruleArr)
    {
        $lowestFreeShippingSalesrule = 0;

        $isInitialValue = true;
        foreach($salesruleArr as $rule) {
            if ($isInitialValue) {
                $lowestFreeShippingSalesrule = $rule['amount'];
                $isInitialValue = false;
                continue;
            }

            if ($lowestFreeShippingSalesrule >  $rule['amount']) {
                $lowestFreeShippingSalesrule = $rule['amount'];
            }
        }

        return $lowestFreeShippingSalesrule;
    }
}