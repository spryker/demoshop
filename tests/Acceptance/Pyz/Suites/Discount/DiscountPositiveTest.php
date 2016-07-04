<?php

namespace Acceptance\Pyz\Suites\DiscountPositiveTest;

use Codeception\TestCase\Test;
use tests\Acceptance\Pyz\Modules\Zed\Discount\DiscountZed;

/**
 * @group positive
 * @group overview
 * @group smoke
 * @group discount
 * 
 */
class DiscountPositiveTest extends Test
{

    /**
     * 1. User can create valid exclusive discount in Zed. Discount is successfully saved.
     *
     */
    public function testCreateExclusiveDiscountPositive()
    {
        DiscountZed::of($this->scenario)
            ->wantTo('Create valid exclusive discount')
            ->expect('Exclusive discount is successfully created')
            ->doLogin("admin@spryker.com", "change123")
            
            ->openCreateDiscountPage()
            ->createDiscount('validExclusiveDiscount')
            
            ->verifySuccessfulAlertIsPresent()
            
            ->activateDiscountFromEditForm()
            ->verifyDiscountIsActivated()
        ;
    }

    /**
     * 2. User can create valid non-exclusive discount in Zed. Discount is successfully saved.
     *
     */
    public function testCreateNonExclusiveDiscountPositive()
    {
        DiscountZed::of($this->scenario)
            ->wantTo('Create valid non-exclusive discount')
            ->expect('Non-exclusive discount is successfully created')
            ->doLogin("admin@spryker.com", "change123")

            ->openCreateDiscountPage()
            ->createDiscount('validNonExclusiveDiscount123')

            ->verifySuccessfulAlertIsPresent()

            ->activateDiscountFromEditForm()
            ->verifyDiscountIsActivated()
        ;
    }
}