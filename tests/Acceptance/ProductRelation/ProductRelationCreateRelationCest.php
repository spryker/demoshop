<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\ProductRelation;

use Acceptance\ProductRelation\PageObject\ProductRelationCreatePage;
use Acceptance\ProductRelation\Tester\ProductRelationCreateRelationTester;
use Spryker\Shared\ProductRelation\ProductRelationTypes;
use YvesAcceptanceTester;

/**
 * @group Acceptance
 * @group ProductRelation
 * @group ProductRelationCreateRelationCest
 */
class ProductRelationCreateRelationCest
{

    /**
     * @param \Acceptance\ProductRelation\Tester\ProductRelationCreateRelationTester $i
     *
     * @return void
     */
    public function testICanCreateProductRelationAndSeeInYves(ProductRelationCreateRelationTester $i)
    {
        $i->wantTo('I want to create up selling relation');
        $i->expect('relation is persisted, exported to yves and carousel component is visible');

        $i->amLoggedInUser();

        $i->amOnPage(ProductRelationCreatePage::URL);

        $i->selectRelationType(ProductRelationTypes::TYPE_RELATED_PRODUCTS);
        $i->filterProductsByName('Samsung Bundle');
        $i->selectProduct(145);

        $i->switchToAssignProductsTab();

        $i->selectProductRule('product_sku', 'equal', '123');

        $i->clickSaveButton();

        $i->see(ProductRelationCreatePage::PRODUCT_SUCCESS_FULLY_CREATED_MESSAGE);

        $i->activateRelation();

        $i->runCollectors();

        $yvesTester = $i->haveFriend('yvesTester', YvesAcceptanceTester::class);

        $yvesTester->does(function (YvesAcceptanceTester $i) {

            $i->amOnPage('/en/samsung-bundle-133');

            $i->canSee('Similar products');
            $i->canSee('Canon LEGRIA HF G25');

        });
    }

}
