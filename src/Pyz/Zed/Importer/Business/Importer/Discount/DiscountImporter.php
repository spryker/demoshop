<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Importer\Business\Importer\Discount;

use Generated\Shared\Transfer\DiscountCalculatorTransfer;
use Generated\Shared\Transfer\DiscountConditionTransfer;
use Generated\Shared\Transfer\DiscountConfiguratorTransfer;
use Generated\Shared\Transfer\DiscountGeneralTransfer;
use Generated\Shared\Transfer\DiscountVoucherTransfer;
use Orm\Zed\Discount\Persistence\Base\SpyDiscountQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Discount\Business\DiscountFacade;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class DiscountImporter extends AbstractImporter
{
    /**
     * @var \Spryker\Zed\Discount\Business\DiscountFacade
     */
    protected $discountFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Discount\Business\DiscountFacade $discountFacade
     */
    public function __construct(LocaleFacadeInterface $localeFacade, DiscountFacade $discountFacade)
    {
        parent::__construct($localeFacade);
        $this->discountFacade = $discountFacade;
    }


    /**
     * @param array $discount
     *
     * @return void
     */
    protected function importOne(array $discount)
    {
        if ($this->hasDiscountWithName($discount['display_name'])) {
            return;
        }

        $discountConfiguratorTransfer = $this->createDiscountConfiguratorTransfer($discount);
        $idDiscount = $this->discountFacade->saveDiscount($discountConfiguratorTransfer);

        if (isset($discount['voucher'])) {
            $discountVoucherTransfer = $this->createDiscountVoucherTransfer($discount, $idDiscount);
            $this->discountFacade->saveVoucherCodes($discountVoucherTransfer);
        }
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return SpyDiscountQuery::create()->count() > 0;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Discount';
    }

    /**
     * @param array $discount
     *
     * @return \Generated\Shared\Transfer\DiscountConfiguratorTransfer
     */
    protected function createDiscountConfiguratorTransfer(array $discount)
    {
        $discountConfiguratorTransfer = new DiscountConfiguratorTransfer();

        $discountConditionTransfer = new DiscountConditionTransfer();
        $discountConditionTransfer->fromArray($discount, true);
        $discountConfiguratorTransfer->setDiscountCondition($discountConditionTransfer);

        $discountGeneralTransfer = new DiscountGeneralTransfer();
        $discountGeneralTransfer->fromArray($discount, true);
        $discountConfiguratorTransfer->setDiscountGeneral($discountGeneralTransfer);

        $discountCalculatorTransfer = new DiscountCalculatorTransfer();
        $discountCalculatorTransfer->fromArray($discount, true);
        $discountConfiguratorTransfer->setDiscountCalculator($discountCalculatorTransfer);
        return $discountConfiguratorTransfer;
    }

    /**
     * @param string $displayName
     *
     * @return bool
     */
    protected function hasDiscountWithName($displayName)
    {
        $exists = SpyDiscountQuery::create()
            ->findByDisplayName($displayName)
            ->count();

        return $exists > 0;
    }

    /**
     * @param array $discount
     * @param int $idDiscount
     *
     * @return \Generated\Shared\Transfer\DiscountVoucherTransfer
     */
    protected function createDiscountVoucherTransfer(array $discount, $idDiscount)
    {
        $voucher = $discount['voucher'];
        $discountVoucherTransfer = new DiscountVoucherTransfer();
        $discountVoucherTransfer->setIdDiscount($idDiscount);
        $discountVoucherTransfer->fromArray($voucher, true);

        return $discountVoucherTransfer;
    }
}
