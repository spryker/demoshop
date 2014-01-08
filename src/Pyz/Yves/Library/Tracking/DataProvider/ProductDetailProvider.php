<?php
namespace Pyz\Yves\Library\Tracking\DataProvider;

use ProjectA\Shared\Price\Code\PriceTypeConstants;
use Pyz\Shared\Catalog\Code\ProductAttributeConstantInterface;
use ProjectA\Shared\Library\Currency\CurrencyManager;
use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Tracking\DataProvider\AbstractDataProvider;
use ProjectA\Yves\Library\Tracking\Tracking;

class ProductDetailProvider extends AbstractDataProvider
{

    const DATA_PROVIDER_NAME = 'product detail tracking data provider';
    const KEY_PRODUCT_DETAIL = 'product detail';

    /**
     * @var \Silex\Application
     */
    protected $app;


    protected $product;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return array
     */
    protected function getProduct()
    {
        if (!$this->product) {
            $product = Tracking::getInstance()->getValue(self::KEY_PRODUCT_DETAIL);
            if ($product) {
                $this->product = $product;
            }
        }
        return $this->product;
    }

    /**
     * @return bool|string
     */
    public function getSku()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }
        return $product['sku'];
    }

    /**
     * @return bool|string
     */
    public function getName()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }
        return str_replace('"', '\'', $product[ProductAttributeConstantInterface::ATTRIBUTE_NAME]);
    }

    /**
     * @return bool|string
     */
    public function getGrandTotal()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }
        return CurrencyManager::getInstance()->convertCentToDecimal($product[PriceTypeConstants::FINAL_GROSS_PRICE]);
    }

    /**
     * @return bool|string
     */
    public function getRecommendedRetailPrice()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }
        return CurrencyManager::getInstance()->convertCentToDecimal($product[PriceTypeConstants::RECOMMENDED_RETAIL_PRICE]);
    }

    /**
     * @return bool|string
     */
    public function getGrandTotalWithoutTax()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }
        $grandTotal = $this->getGrandTotal();
        $taxPercentage = $product[ProductAttributeConstantInterface::ATTRIBUTE_TAX_RATE];
        $tax = ($grandTotal / 100) * $taxPercentage;

        return number_format($grandTotal - $tax, 2);
    }

    /**
     * @return bool|string
     */
    public function getRecommendedRetailPriceWithoutTax()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }
        $recommendedRetailPrice = $this->getRecommendedRetailPrice();
        $taxPercentage = $product[ProductAttributeConstantInterface::ATTRIBUTE_TAX_RATE];
        $tax = ($recommendedRetailPrice / 100) * $taxPercentage;

        return number_format($recommendedRetailPrice - $tax, 2);
    }

    /**
     * @return bool|string
     */
    public function getDetailPageUrl()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }
        $baseUrl = \ProjectA_Shared_Library_Config::get('host')['yves'];

        return $baseUrl . $product[ProductAttributeConstantInterface::ATTRIBUTE_URL];
    }

    /**
     * @return bool|string
     */
    public function getQuantity()
    {
        $product = $this->getProduct();
        if (!$product) {
            return false;
        }

        return $product['stock'];
    }
}
