<?php

/**
 * (c) Spryker Systems GmbH copyright protected.
 */
namespace Pyz\Zed\Product\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Product\Business\ProductFacadeInterface as SprykerProductFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface ProductFacadeInterface extends SprykerProductFacadeInterface
{
    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData);

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData);

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger);

    /**
     * @param int                                       $idProductAbstract
     * @param string                                    $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Url\Business\Exception\UrlExistsException
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return \Generated\Shared\Transfer\UrlTransfer
     */
    public function createAndTouchProductUrlByIdProduct($idProductAbstract, $url, LocaleTransfer $locale);
}
