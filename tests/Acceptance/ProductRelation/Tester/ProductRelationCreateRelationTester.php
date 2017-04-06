<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\ProductRelation\Tester;

use ZedAcceptanceTester;

class ProductRelationCreateRelationTester extends ZedAcceptanceTester
{

    /**
     * @var int
     */
    protected $numberOfRulesSelected = 0;

    /**
     * @param string $type
     *
     * @return $this
     */
    public function selectRelationType($type)
    {
        $this->selectOption('//*[@id="product_relation_productRelationType"]', $type);

        return $this;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function filterProductsByName($name)
    {
        $this->fillField('//*[@id="product-table_filter"]/label/input', $name);

        return $this;
    }

    /**
     * @param string $sku
     *
     * @return $this
     */
    public function selectProduct($sku)
    {
        $buttonElementId = sprintf('//*[@id="select-product-%s"]', $sku);

        $this->waitForElementNotVisible('//*[@id="product-table_processing"]', 5);
        $this->waitForElement($buttonElementId, 5);

        $this->click($buttonElementId);

        return $this;
    }

    /**
     * @return $this
     */
    public function switchToAssignProductsTab()
    {
        $this->click('//*[@id="form-product-relation"]/div/ul/li[2]/a');

        return $this;
    }

    /**
     * @param string $ruleName
     * @param string $operator
     * @param string $value
     *
     * @return $this
     */
    public function selectProductRule($ruleName, $operator, $value)
    {
        $ruleSelectorBaseId = sprintf('[@id="builder_rule_%d"]', $this->numberOfRulesSelected);

        $this->selectOption(sprintf('//*%s/div[3]/select', $ruleSelectorBaseId), $ruleName);
        $this->selectOption(sprintf('//*%s/div[4]/select', $ruleSelectorBaseId), $operator);
        $this->fillField(sprintf('//*%s/div[5]/input', $ruleSelectorBaseId), $value);

        $this->numberOfRulesSelected++;

        return $this;
    }

    /**
     * @return $this
     */
    public function clickSaveButton()
    {
        $this->click('//*[@id="submit-relation"]');

        return $this;
    }

    /**
     * @return $this
     */
    public function activateRelation()
    {
        $this->click('//*[@id="activate-relation"]');

        return $this;
    }

}
