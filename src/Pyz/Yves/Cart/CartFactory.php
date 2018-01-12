<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart;

use Pyz\Yves\Cart\Form\VoucherForm;
use Pyz\Yves\Cart\Handler\CartItemHandler;
use Pyz\Yves\Cart\Handler\CartOperationHandler;
use Pyz\Yves\Cart\Handler\CodeHandler;
use Pyz\Yves\Cart\Handler\ProductBundleCartOperationHandler;
use Pyz\Yves\Cart\Plugin\Provider\AttributeVariantsProvider;
use Pyz\Yves\Product\Mapper\AttributeVariantMapper;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouper;

class CartFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Client\Calculation\CalculationClientInterface
     */
    public function getCalculationClient()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CLIENT_CALCULATION);
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\CodeHandler
     */
    public function createCartCodeHandler()
    {
        return new CodeHandler(
            $this->getCalculationClient(),
            $this->getCartClient(),
            $this->getFlashMessenger(),
            $this->getCodeHandlerPlugins()
        );
    }

    /**
     * @return \Pyz\Yves\Cart\Plugin\CodeHandlerInterface[]
     */
    protected function getCodeHandlerPlugins()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CODE_HANDLER_PLUGINS);
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\CartOperationHandler
     */
    public function createCartOperationHandler()
    {
        return new CartOperationHandler(
            $this->getCartClient(),
            $this->getLocale(),
            $this->getFlashMessenger(),
            $this->getRequest(),
            $this->getAvailabilityClient()
        );
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\ProductBundleCartOperationHandler
     */
    public function createProductBundleCartOperationHandler()
    {
        return new ProductBundleCartOperationHandler(
            $this->createCartOperationHandler(),
            $this->getCartClient(),
            $this->getLocale(),
            $this->getFlashMessenger()
        );
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\CartItemHandlerInterface
     */
    public function createCartItemHandler()
    {
        return new CartItemHandler(
            $this->createCartOperationHandler(),
            $this->getCartClient(),
            $this->getProductClient(),
            $this->getStorageProductMapperPlugin(),
            $this->getFlashMessenger()
        );
    }

    /**
     * @return \Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouper
     */
    public function createProductBundleGrouper()
    {
        return new ProductBundleGrouper();
    }

    /**
     * @return \Spryker\Yves\Kernel\Application
     */
    protected function getApplication()
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    protected function getFlashMessenger()
    {
        return $this->getApplication()['flash_messenger'];
    }

    /**
     * @return string
     */
    protected function getLocale()
    {
        return $this->getApplication()['locale'];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->getApplication()['request'];
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getVoucherForm()
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY)
            ->create($this->createVoucherFormType());
    }

    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    protected function createVoucherFormType()
    {
        return new VoucherForm();
    }

    /**
     * @return \Pyz\Yves\Checkout\Plugin\CheckoutBreadcrumbPlugin
     */
    public function getCheckoutBreadcrumbPlugin()
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGIN_CHECKOUT_BREADCRUMB);
    }

    /**
     * @return \Spryker\Yves\CartVariant\Dependency\Plugin\CartVariantAttributeMapperPluginInterface
     */
    public function getCartVariantAttributeMapperPlugin()
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGIN_CART_VARIANT);
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\AttributeVariantMapperInterface
     */
    protected function createAttributeVariantMapper()
    {
        return new AttributeVariantMapper($this->getProductClient());
    }

    /**
     * @return \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    protected function getStorageProductMapperPlugin()
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGIN_STORAGE_PRODUCT_MAPPER);
    }

    /**
     * @return \Pyz\Yves\Cart\Plugin\Provider\AttributeVariantsProvider
     */
    public function createCartItemsAttributeProvider()
    {
        return new AttributeVariantsProvider(
            $this->getCartVariantAttributeMapperPlugin(),
            $this->createCartItemHandler()
        );
    }

    /**
     * @return \Spryker\Client\Product\ProductClientInterface $productClient
     */
    protected function getProductClient()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CLIENT_PRODUCT);
    }

    /**
     * @return \Spryker\Yves\DiscountPromotion\Dependency\PromotionProductMapperPluginInterface
     */
    public function getProductPromotionMapperPlugin()
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGIN_PROMOTION_PRODUCT_MAPPER);
    }

    /**
     * @return \Spryker\Client\Availability\AvailabilityClientInterface
     */
    protected function getAvailabilityClient()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CLIENT_AVAILABILITY);
    }
}
