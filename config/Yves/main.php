<?php
return array(
    'basePath' => realpath(__DIR__ . '/../'),
    'name' => 'Saatchi Online',
    'language' => ProjectA_Shared_Library_Store::getInstance()->getCurrentLanguage(),
    'defaultController' => Sao_Yves_Library_Routing_UrlManager::ROUTE_DEFAULT,
    'modules' => array('artist', 'index', 'catalog', 'cart', 'cep', 'contact', 'customer', 'cms', 'checkout', 'newsletter', 'partner', 'product', 'search', 'transactionstatus', 'monitoring', 'system', 'legacy'),
    'components' => array(
        'translation' => array(
            'class' => 'Yp_Base_Translation'
        ),
        'urlManager' => array(
            'class' => 'Yp_Routing_UrlManager',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                array('class' => 'Yp_Routing_Resolver_LegacyRedirect'),
                array('class' => 'Yc_Routing_Resolver_Default'),
                array('class' => 'Yp_Routing_Resolver_Index'),
                array('class' => 'Yp_Routing_Resolver_ProductDetail'),
                array('class' => 'Yp_Routing_Resolver_ProductListing'),
                array('class' => 'Yp_Routing_Resolver_ProductSeo'),
                array('class' => 'Yp_Routing_Resolver_Cms'),
                array('class' => 'Yp_Routing_Resolver_Cms_Redirection'),
                array('cart/index/add', 'pattern'=>'cart/add/sku/<sku:[\w\d-]+>', 'verb'=>'GET'),
                array('cart/product/create', 'pattern'=>'product/<sku:\d+>', 'verb'=>'POST'),
                array('cart/product/update', 'pattern'=>'product/<sku:\d+>', 'verb'=>'PUT'),
                array('cart/product/delete', 'pattern'=>'product/<sku:\d+>', 'verb'=>'DELETE'),
                array('artist/artworkavailability/index', 'pattern'=>'artworkavailability/<hash:\w+>', 'verb'=>'GET'),
                array('artist/artworkavailability/check', 'pattern'=>'artworkavailability/check'),
                array('checkout/artist/originalnotification', 'pattern'=>'checkout/notification/<hash:\w+>/<status:\w+>', 'verb'=>'GET'),
                array('class' => 'Yp_Routing_Resolver_Error404'),
            )
        ),
        'user' => array(
            'class' => 'Yp_Customer_Model_User',
            'allowAutoLogin' => false,
        ),
        'session' => array(
            'autoStart' => true,
        ),
        'request' => array(
            'class' => 'Yc_HttpRequest_Model_HttpRequest',
            'enableCsrfValidation' => true,
            'noCsrfValidationRoutes' => array(
                'cart/index/add',
                'cart/index/recalculate',
                'newsletter/ajax/subscribe',
                'transactionstatus/index',
                'api/update',
                'transactionstatus/mundipagg',
                'monitoring/logging',
                'checkout/step/store'
            ),
        ),
        'clientScript' => array(
            'class' => 'CClientScript',
            'coreScriptPosition' => CClientScript::POS_HEAD,
            'corePackages' => array(
                'jquery' => array(
                    'baseUrl' => null,
                    'js' => null,
                )
            ),
        ),
    ),
    'preload' => array(
        'translation', 'ids'
    ),
    'params' => array(
        'encryptionKey' => 'dfk$#K2l3cla$C',
    )
);
