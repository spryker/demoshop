<?php

namespace Pyz\Zed\Product\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Product\Business\ProductFacade as SprykerProductFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\Product\Business\ProductBusinessFactory getFactory()
 */
class ProductFacade extends SprykerProductFacade implements ProductFacadeInterface
{

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        return $this->getFactory()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData)
    {
        return $this->getFactory()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @param int $idProductAbstract
     * @param string $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Url\Business\Exception\UrlExistsException
     * @throws \Spryker\Zed\Product\Business\Exception\MissingProductException
     *
     * @return \Generated\Shared\Transfer\UrlTransfer
     */
    public function createAndTouchProductUrlByIdProduct($idProductAbstract, $url, LocaleTransfer $locale)
    {
        return $this->getFactory()
            ->createProductManager()
            ->createAndTouchProductUrlByIdProduct($idProductAbstract, $url, $locale);
    }

}
