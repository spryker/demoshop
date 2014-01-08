<?php
namespace Pyz\Yves\Library\Tracking\Provider;

use Generated\Shared\Sales\Transfer\Order;
use Pyz\Yves\Library\Tracking\DataProvider\PageTypeDataProvider;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Library\Tracking\DataProvider\CartDataProvider;
use ProjectA\Yves\Library\Tracking\DataProvider\CustomerDataProvider;
use ProjectA\Yves\Library\Tracking\DataProvider\ItemDataProvider;
use ProjectA\Yves\Library\Tracking\Provider\ProviderInterface;
use ProjectA\Yves\Library\Tracking\Tracking;

class GoogleAnalytics implements ProviderInterface, PageTypeInterface
{

    /**
     * @param array $dataProvider
     * @param $pageType
     * @return mixed|string
     */
    public function getTrackingOutput(array $dataProvider, $pageType)
    {
        switch ($pageType) {
            case self::PAGE_TYPE_HOME:
            case self::PAGE_TYPE_REGISTRATION:
            case self::PAGE_TYPE_STATIC:
            case self::PAGE_TYPE_CART:
            case self::PAGE_TYPE_CHECKOUT:
            case self::PAGE_TYPE_CAMPAIGN:
            case self::PAGE_TYPE_PRODUCT_DETAIL:
                return $this->getHomepageTracking($dataProvider, $pageType);
                break;

            case self::PAGE_TYPE_SUCCESS:
                return $this->getSuccessPageTracking($dataProvider, $pageType);
                break;
        }
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return Tracking::POSITION_BEFORE_CLOSING_HEAD;
    }

    /**
     *
     */
    protected function getHomepageTracking(array $dataProvider, $pageType)
    {
        /* @var $customerDataProvider CustomerDataProvider */
        $customerDataProvider = $dataProvider[CustomerDataProvider::DATA_PROVIDER_NAME];
        /* @var $cartDataProvider CartDataProvider */
        $cartDataProvider = $dataProvider[CartDataProvider::DATA_PROVIDER_NAME];

        return "<script type=\"text/javascript\">

          var _gaq = _gaq || [];
          var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
          _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
          _gaq.push(['_setAccount', 'UA-45691647-1']);
          _gaq.push(['_setDomainName', 'migusta.de']);
          _gaq.push(['_setCustomVar',1,'pageType','" . $pageType . "',3]);
          _gaq.push(['_setCustomVar',2,'userId','" . $customerDataProvider->getIncrementId() . "',1]);
          _gaq.push(['_setCustomVar',3,'basketvalue','" . $cartDataProvider->getGrandTotal(0.00) . "',2]);
          _gaq.push(['_gat._anonymizeIp']);
          _gaq.push(['_trackPageview']);

          (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>";
    }

    /**
     * @param array $dataProvider
     * @param $pageType
     * @return string
     */
    protected function getSuccessPageTracking(array $dataProvider, $pageType)
    {
        /* @var $cartDataProvider CartDataProvider */
        $cartDataProvider = $dataProvider[CartDataProvider::DATA_PROVIDER_NAME];
        /* @var $customerDataProvider CustomerDataProvider */
        $customerDataProvider = $dataProvider[CustomerDataProvider::DATA_PROVIDER_NAME];
        /* @var $order Order */
        $order = $cartDataProvider->getOrder();

        $tracking = "<script type=\"text/javascript\">
            var _gaq = _gaq || [];
            var pluginUrl =
            '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
            _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
            _gaq.push(['_setAccount', 'UA-45691647-1']);
            _gaq.push(['_setDomainName', 'migusta.de']);
            _gaq.push(['_setCustomVar',1,'pageType','" . $pageType . "',3]);
            _gaq.push(['_setCustomVar',2,'userId','" . $customerDataProvider->getIncrementId() . "',1]);
            _gaq.push(['_gat._anonymizeIp']);
            _gaq.push(['_trackPageview']);
            _gaq.push(['_addTrans',
               '" . $order->getIncrementId() . "',
               'www.migusta.de',
               '" . $cartDataProvider->getGrandTotal() . "',
               '" . $cartDataProvider->getTax() . "',
               '" . $cartDataProvider->getShipping() . "',
               '" . $order->getShippingAddress()->getCity() . "',
               '" . \ProjectA_Shared_Library_Store::getInstance()->getCurrentLanguage() . "',
               '" . $order->getShippingAddress()->getFkMiscCountry() . "'
            ]);
        " . PHP_EOL;


        /* @var $itemDataProvider ItemDataProvider */
        $itemDataProvider = $dataProvider[ItemDataProvider::DATA_PROVIDER_NAME];
        /* @var $item ItemDataProvider */
        foreach ($itemDataProvider as $item) {
            $tracking .= "_gaq.push(['_addItem',
                '" . $order->getIncrementId() . "',
                '" . $item->getSku() . "',
                '" . $item->getName() . "',
                '',                                 // category or variation
                '" . $item->getGrandTotal() . "',
                '1'
                ]);
            " . PHP_EOL;
        }

        $tracking .= "_gaq.push(['_trackTrans']); //submits transaction to the Analytics servers
            (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
            </script>
        ";

        return $tracking;
    }
}
