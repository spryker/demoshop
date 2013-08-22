<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

// ZED
$config['zed']['customercare']['zed_backlink'] = 'zed.saatchionline.com';

// DWH
$config['dwh']['data-dir'] = '/data/storage/production/static/US/protected/dwh/';

// Tracking, online marketing
$config['yves'] = array(
    'tracking' => true
);
$config['mcm'] = array(
    'username_webtrekk'    => 'saatchi.master',
    'password_webtrekk'    => 'Gih94!e0',
    'tracking_id_webtrekk' => '966195722253779'
);

$config['adwords'] = array(
    'email' => 'adwords@project-a.com',
    'password' => 'trehaSaGa2etHasp',
    'developer-token' => 'G5CMr3ixv-nqnmnF_u5Ovg',
    'mcc-client-id' => null
);

// ArtistPortal
$config['legacy'] = array(
    'http' => array(
        'ssl' => true,
        'verifySsl' => false,
        'session' => array(
            'name' => 'saatchisc',
            'domain' => 'www.saatchionline.com'
        ),
        'auth' => array(
            'username' => '',
            'password' => ''
        ),
    ),
    'memcache' => array(
        'host' => 'prod-sessions-02.usw1.isaatchi.com',
        'port' => '11211',
        'prefix' => ''
    )
);

$config['yves']['session']['name'] = $config['legacy']['http']['session']['name'];
$config['yves']['session']['domain'] = $config['legacy']['http']['session']['domain'];

// APIs
$config['mail-chimp']['api-key'] = '81ca97067cdcc4ec9ba9d14d389b502f-us1';

$config['fulfillment']['sba']['apiUrl'] = 'https://www.sbaglobal.com/sba/webservice/shippingwebservice.asmx?wsdl';
$config['fulfillment']['sba']['customer_number'] = '689102';
$config['fulfillment']['sba']['password'] = 'sba0506130454';

$config['fulfillment']['jondo']['dpqApiUrl'] = 'http://harvestDigitalPrinting.com/integration/api/quoteApi.php';
$config['fulfillment']['jondo']['cofApiUrl'] = 'http://harvestDigitalPrinting.com/integration/cofApi.php';
$config['fulfillment']['jondo']['testMode'] = false;

$config['aws']['s3'] = array(
    'bucket' => array(
        'packaging-slip' => array('key' => 'saatchi-general', 'path' => 'fulfillment/general/packingSlips')
    ),
    'zone'   => 'us-west-1'
);