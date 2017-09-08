<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\ProductRelation\Presentation;

use PyzTest\Zed\ProductRelation\PageObject\ProductRelationCreatePage;
use PyzTest\Zed\ProductRelation\ProductRelationPresentationTester;
use Spryker\Shared\ProductRelation\ProductRelationTypes;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group ProductRelation
 * @group Presentation
 * @group ProductRelationCreateRelationCest
 * Add your own group annotations below this line
 */
class ProductRelationCreateRelationCest
{

    /**
     * @param \PyzTest\Zed\ProductRelation\ProductRelationPresentationTester $i
     *
     * @return void
     */
    public function testICanCreateProductRelationAndSeeInYves(ProductRelationPresentationTester $i)
    {
        $i->wantTo('I want to create up selling relation');
        $i->expect('relation is persisted, exported to yves and carousel component is visible');

        $i->amLoggedInUser();

        $i->amOnPage(ProductRelationCreatePage::URL);

        $i->selectRelationType(ProductRelationTypes::TYPE_RELATED_PRODUCTS);
        $i->filterProductsByName('Samsung Bundle');
        $i->selectProduct(214);

        $i->switchToAssignProductsTab();

        $i->selectProductRule('product_sku', 'equal', '123');

        $i->clickSaveButton();

        $i->see(ProductRelationCreatePage::PRODUCT_SUCCESS_FULLY_CREATED_MESSAGE);

        $i->activateRelation();

        $i->runCollectors();
        $i->wait(5);

        $i->amYves();
        $i->amOnPage('/en/samsung-bundle-214');
        $i->canSee('Similar products');
        $i->canSee('HP EliteDesk 800 G2');
    }

}
