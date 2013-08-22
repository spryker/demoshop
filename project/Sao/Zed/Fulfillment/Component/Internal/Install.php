<?php
class Sao_Zed_Fulfillment_Component_Internal_Install implements ProjectA_Zed_Library_Component_Interface_InstallInterface, ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const KEY_ARTIST_COST = 'artist_cost';
    const KEY_VENDOR_PRICE = 'vendor_price';

    /**
     * @var Sao_Zed_Fulfillment_Component_Factory
     */
    protected $factory;

    /**
     * @return bool
     */
    public function isActive()
    {
        return true;
    }

    /**
     *
     */
    public function install()
    {
        $this->addShippingAgents();
        $this->addFulfillmentProvider();
        $this->addJondoProducts();
        $this->addUniversalProducts();
    }

    protected function addFulfillmentProvider()
    {
        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->filterByShortName('jondo')->findOneOrCreate();
        if ($entity->isNew()) {
            $entity->setName('Jondo');
            $entity->setShortName('jondo');
            $entity->setEmail('');
            $entity->setLegacyId(1);
            $entity->save();
        }
        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->filterByShortName('sba')->findOneOrCreate();
        if ($entity->isNew()) {
            $entity->setName('SBA');
            $entity->setEmail('');
            $entity->setShortName('sba');
            $entity->setLegacyId(2);
            $entity->save();
        }
        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->filterByShortName('marcofinearts')->findOneOrCreate();
        if ($entity->isNew()) {
            $entity->setName('Marco Finearts');
            $entity->setEmail('');
            $entity->setShortName('marcofinearts');
            $entity->setLegacyId(3);
            $entity->save();
        }
        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->filterByShortName('universal')->findOneOrCreate();
        if ($entity->isNew()) {
            $entity->setName('Universal');
            $entity->setEmail('');
            $entity->setShortName('universal');
            $entity->setLegacyId(4);
            $entity->save();
        }
    }

    protected function addShippingAgents()
    {
        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()->filterByInternalName('usps')->findOneOrCreate();

            $entity->setName('US Postal Service');
            $entity->setTrackingUrl('https://tools.usps.com/go/TrackConfirmAction_input?origTrackNum=');
            $entity->save();

        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()->filterByInternalName('fedex')->findOneOrCreate();

            $entity->setName('FedEx');
            $entity->setTrackingUrl('https://www.fedex.com/fedextrack/?tracknumbers=');
            $entity->save();

        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()->filterByInternalName('dhl')->findOneOrCreate();

            $entity->setName('DHL');
            $entity->setTrackingUrl('http://www.dhl.com/content/g0/en/express/tracking.shtml?brand=DHL&AWB=');
            $entity->save();

        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()->filterByInternalName('sba')->findOneOrCreate();

            $entity->setName('SBA');
            $entity->setTrackingUrl('https://www.sbaglobal.com/sba/ShipmentTrackingPage.aspx?hawb=');
            $entity->save();

        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()->filterByInternalName('ups')->findOneOrCreate();
        if ($entity->isNew()) {
            $entity->setName('UPS');
            $entity->setTrackingUrl('http://wwwapps.ups.com/WebTracking/track?loc=en_US&Requester=UPSHome&WT.mc_id=UPS_App_trckdetbutton&WBPM_lid=pesmod/ct1.html_trk_div&track.x=Track&trackNums=');
            $entity->save();
        }
        $entity = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()->filterByInternalName('pickup')->findOneOrCreate();

            $entity->setName('Pickup');
            $entity->setTrackingUrl('');
            $entity->save();

    }

    protected function addJondoProducts()
    {
        // legacyproductid => provider product id
        // legacyproductid => array (framing option, provider product id)
        $products = array(2   => 8009,
                          3   => 8011,
                          4   => 8018,
                          5   => 8022,
                          6   => 8026,
                          7   => 8029,
                          8   => 8001,
                          9   => 8004,
                          10  => 8012,
                          11  => 8019,
                          12  => 8006,
                          13  => 8016,
                          14  => 8023,
                          15  => 8027,
                          16  => 8010,
                          17  => 8013,
                          18  => 8020,
                          19  => 8024,
                          20  => 8028,
                          21  => 8030,
                          22  => 8031,
                          23  => 8002,
                          24  => 8007,
                          25  => 8014,
                          26  => 8017,
                          27  => 8021,
                          28  => 8025,
                          29  => 8003,
                          30  => 8008,
                          31  => 8015,
                          52  => 8089,
                          53  => array(8091, array(7, 8591), array(5, 8791), array(8, 8897), array(6, 8904)),
                          54  => 8098,
                          55  => 8102,
                          56  => 8106,
                          57  => 8109,
                          58  => array(8081, array(3, 8889), array(1, 8893), array(4, 8911), array(2, 8915)),
                          59  => array(8084, array(3, 8890), array(1, 8894), array(4, 8912), array(2, 8916)),
                          60  => array(8092, array(7, 8592), array(5, 8792), array(8, 8898), array(6, 8905)),
                          61  => 8099,
                          62  => array(8086, array(3, 8891), array(1, 8895), array(4, 8913), array(2, 8917)),
                          63  => array(8096, array(7, 8596), array(5, 8796), array(8, 8901), array(6, 8908)),
                          64  => array(8103, array(7, 8603), array(5, 8803), array(8, 8903), array(6, 8910)),
                          65  => 8107,
                          66  => array(8090, array(3, 8892), array(1, 8896), array(4, 8914), array(2, 8918)),
                          67  => array(8093, array(7, 8593), array(5, 8793), array(8, 8899), array(6, 8906)),
                          68  => array(8100, array(7, 8600), array(5, 8800), array(8, 8902), array(6, 8909)),
                          69  => 8104,
                          70  => 8108,
                          71  => 8110,
                          73  => 8082,
                          74  => 8087,
                          75  => array(8094, array(7, 8594), array(5, 8794), array(8, 8900), array(6, 8907)),
                          76  => 8097,
                          77  => 8101,
                          78  => 8105,
                          79  => 8083,
                          80  => 8088,
                          81  => 8095,
                          72  => 8111,
                          102 => 8049,
                          103 => array(8051, array(7, 8551), array(5, 8751), array(8, 8864), array(6, 8871)),
                          104 => 8058,
                          105 => 8062,
                          106 => 8066,
                          107 => 8069,
                          108 => array(8041, array(3, 8850), array(1, 8857), array(4, 8878), array(2, 8885)),
                          109 => array(8044, array(3, 8851), array(1, 8858), array(4, 8879), array(2, 8886)),
                          110 => array(8052, array(7, 8552), array(5, 8752), array(8, 8865), array(6, 8872)),
                          111 => 8059,
                          112 => array(8046, array(3, 8852), array(1, 8859), array(4, 8880), array(2, 8887)),
                          113 => array(8056, array(7, 8556), array(5, 8756), array(8, 8868), array(6, 8875)),
                          114 => array(8063, array(7, 8563), array(5, 8763), array(8, 8870), array(6, 8877)),
                          115 => 8067,
                          116 => array(8050, array(3, 8853), array(1, 8860), array(4, 8860), array(2, 8888)),
                          117 => array(8053, array(7, 8553), array(5, 8753), array(8, 8866), array(6, 8873)),
                          118 => array(8060, array(7, 8560), array(5, 8760), array(8, 8869), array(6, 8876)),
                          119 => 8064,
                          120 => 8068,
                          121 => 8070,
                          123 => 8042,
                          124 => 8047,
                          125 => array(8054, array(7, 8554), array(5, 8754), array(8, 8867), array(6, 8874)),
                          126 => 8057,
                          127 => 8061,
                          128 => 8065,
                          129 => 8043,
                          130 => 8048,
                          131 => 8055,
                          122 => 8071,
        );

        $mappingToCosts = [
            '2_8009' => [self::KEY_VENDOR_PRICE => 2800, self::KEY_ARTIST_COST => 4200],
            '3_8011' => [self::KEY_VENDOR_PRICE => 3200, self::KEY_ARTIST_COST => 3200],
            '4_8018' => [self::KEY_VENDOR_PRICE => 4400, self::KEY_ARTIST_COST => 6050],
            '5_8022' => [self::KEY_VENDOR_PRICE => 5600, self::KEY_ARTIST_COST => 5600],
            '6_8026' => [self::KEY_VENDOR_PRICE => 8800, self::KEY_ARTIST_COST => 8800],
            '7_8029' => [self::KEY_VENDOR_PRICE => 11200, self::KEY_ARTIST_COST => 15400],
            '8_8001' => [self::KEY_VENDOR_PRICE => 2000, self::KEY_ARTIST_COST => 2750],
            '9_8004' => [self::KEY_VENDOR_PRICE => 2400, self::KEY_ARTIST_COST => 3600],
            '10_8012' => [self::KEY_VENDOR_PRICE => 3600, self::KEY_ARTIST_COST => 3600],
            '11_8019' => [self::KEY_VENDOR_PRICE => 4640, self::KEY_ARTIST_COST => 6380],
            '12_8006' => [self::KEY_VENDOR_PRICE => 2800, self::KEY_ARTIST_COST => 2800],
            '13_8016' => [self::KEY_VENDOR_PRICE => 4000, self::KEY_ARTIST_COST => 6000],
            '14_8023' => [self::KEY_VENDOR_PRICE => 6000, self::KEY_ARTIST_COST => 6000],
            '15_8027' => [self::KEY_VENDOR_PRICE => 9600, self::KEY_ARTIST_COST => 9600],
            '16_8010' => [self::KEY_VENDOR_PRICE => 4800, self::KEY_ARTIST_COST => 6900],
            '17_8013' => [self::KEY_VENDOR_PRICE => 4000, self::KEY_ARTIST_COST => 6000],
            '18_8020' => [self::KEY_VENDOR_PRICE => 5200, self::KEY_ARTIST_COST => 7475],
            '19_8024' => [self::KEY_VENDOR_PRICE => 6000, self::KEY_ARTIST_COST => 8625],
            '20_8028' => [self::KEY_VENDOR_PRICE => 11200, self::KEY_ARTIST_COST => 15400],
            '21_8030' => [self::KEY_VENDOR_PRICE => 22400, self::KEY_ARTIST_COST => 29400],
            '22_8031' => [self::KEY_VENDOR_PRICE => 28000, self::KEY_ARTIST_COST => 36750],
            '23_8002' => [self::KEY_VENDOR_PRICE => 4000, self::KEY_ARTIST_COST => 5500],
            '24_8007' => [self::KEY_VENDOR_PRICE => 4800, self::KEY_ARTIST_COST => 6600],
            '25_8014' => [self::KEY_VENDOR_PRICE => 6000, self::KEY_ARTIST_COST => 8250],
            '26_8017' => [self::KEY_VENDOR_PRICE => 6400, self::KEY_ARTIST_COST => 8800],
            '27_8021' => [self::KEY_VENDOR_PRICE => 6400, self::KEY_ARTIST_COST => 9200],
            '28_8025' => [self::KEY_VENDOR_PRICE => 11200, self::KEY_ARTIST_COST => 14700],
            '29_8003' => [self::KEY_VENDOR_PRICE => 4800, self::KEY_ARTIST_COST => 6600],
            '30_8008' => [self::KEY_VENDOR_PRICE => 5600, self::KEY_ARTIST_COST => 7700],
            '31_8015' => [self::KEY_VENDOR_PRICE => 7600, self::KEY_ARTIST_COST => 10450],
            '52_8089' => [self::KEY_VENDOR_PRICE => 1120, self::KEY_ARTIST_COST => 1120],
            '53_8091' => [self::KEY_VENDOR_PRICE => 1440, self::KEY_ARTIST_COST => 1440],
            '54_8098' => [self::KEY_VENDOR_PRICE => 1920, self::KEY_ARTIST_COST => 1920],
            '55_8102' => [self::KEY_VENDOR_PRICE => 2960, self::KEY_ARTIST_COST => 4107],
            '56_8106' => [self::KEY_VENDOR_PRICE => 5120, self::KEY_ARTIST_COST => 6720],
            '57_8109' => [self::KEY_VENDOR_PRICE => 5920, self::KEY_ARTIST_COST => 7918],
            '58_8081' => [self::KEY_VENDOR_PRICE => 640, self::KEY_ARTIST_COST => 640],
            '59_8084' => [self::KEY_VENDOR_PRICE => 960, self::KEY_ARTIST_COST => 960],
            '60_8092' => [self::KEY_VENDOR_PRICE => 1680, self::KEY_ARTIST_COST => 1680],
            '61_8099' => [self::KEY_VENDOR_PRICE => 2720, self::KEY_ARTIST_COST => 3638],
            '62_8086' => [self::KEY_VENDOR_PRICE => 1280, self::KEY_ARTIST_COST => 1840],
            '63_8096' => [self::KEY_VENDOR_PRICE => 2320, self::KEY_ARTIST_COST => 2320],
            '64_8103' => [self::KEY_VENDOR_PRICE => 3920, self::KEY_ARTIST_COST => 5145],
            '65_8107' => [self::KEY_VENDOR_PRICE => 5520, self::KEY_ARTIST_COST => 7245],
            '66_8090' => [self::KEY_VENDOR_PRICE => 1680, self::KEY_ARTIST_COST => 2520],
            '67_8093' => [self::KEY_VENDOR_PRICE => 1920, self::KEY_ARTIST_COST => 2880],
            '68_8100' => [self::KEY_VENDOR_PRICE => 2720, self::KEY_ARTIST_COST => 4080],
            '69_8104' => [self::KEY_VENDOR_PRICE => 4320, self::KEY_ARTIST_COST => 6156],
            '70_8108' => [self::KEY_VENDOR_PRICE => 5920, self::KEY_ARTIST_COST => 8214],
            '71_8110' => [self::KEY_VENDOR_PRICE => 7120, self::KEY_ARTIST_COST => 9879],
            '73_8082' => [self::KEY_VENDOR_PRICE => 1600, self::KEY_ARTIST_COST => 2360],
            '74_8087' => [self::KEY_VENDOR_PRICE => 1760, self::KEY_ARTIST_COST => 2640],
            '75_8094' => [self::KEY_VENDOR_PRICE => 3520, self::KEY_ARTIST_COST => 4928],
            '76_8097' => [self::KEY_VENDOR_PRICE => 3520, self::KEY_ARTIST_COST => 5280],
            '77_8101' => [self::KEY_VENDOR_PRICE => 5520, self::KEY_ARTIST_COST => 7245],
            '78_8105' => [self::KEY_VENDOR_PRICE => 5520, self::KEY_ARTIST_COST => 7659],
            '79_8083' => [self::KEY_VENDOR_PRICE => 1920, self::KEY_ARTIST_COST => 2712],
            '80_8088' => [self::KEY_VENDOR_PRICE => 2720, self::KEY_ARTIST_COST => 3808],
            '81_8095' => [self::KEY_VENDOR_PRICE => 4720, self::KEY_ARTIST_COST => 6195],
            '72_8111' => [self::KEY_VENDOR_PRICE => 9120, self::KEY_ARTIST_COST => 11970],
            '102_8049' => [self::KEY_VENDOR_PRICE => 1440, self::KEY_ARTIST_COST => 1440],
            '103_8051' => [self::KEY_VENDOR_PRICE => 2000, self::KEY_ARTIST_COST => 2000],
            '104_8058' => [self::KEY_VENDOR_PRICE => 2720, self::KEY_ARTIST_COST => 2720],
            '105_8062' => [self::KEY_VENDOR_PRICE => 3920, self::KEY_ARTIST_COST => 5292],
            '106_8066' => [self::KEY_VENDOR_PRICE => 5920, self::KEY_ARTIST_COST => 7918],
            '107_8069' => [self::KEY_VENDOR_PRICE => 7120, self::KEY_ARTIST_COST => 9523],
            '108_8041' => [self::KEY_VENDOR_PRICE => 640, self::KEY_ARTIST_COST => 640],
            '109_8044' => [self::KEY_VENDOR_PRICE => 1040, self::KEY_ARTIST_COST => 1040],
            '110_8052' => [self::KEY_VENDOR_PRICE => 2320, self::KEY_ARTIST_COST => 2320],
            '111_8059' => [self::KEY_VENDOR_PRICE => 3520, self::KEY_ARTIST_COST => 4664],
            '112_8046' => [self::KEY_VENDOR_PRICE => 1440, self::KEY_ARTIST_COST => 2160],
            '113_8056' => [self::KEY_VENDOR_PRICE => 2720, self::KEY_ARTIST_COST => 2720],
            '114_8063' => [self::KEY_VENDOR_PRICE => 4720, self::KEY_ARTIST_COST => 6313],
            '115_8067' => [self::KEY_VENDOR_PRICE => 6320, self::KEY_ARTIST_COST => 8453],
            '116_8050' => [self::KEY_VENDOR_PRICE => 2320, self::KEY_ARTIST_COST => 3219],
            '117_8053' => [self::KEY_VENDOR_PRICE => 2720, self::KEY_ARTIST_COST => 3774],
            '118_8060' => [self::KEY_VENDOR_PRICE => 3520, self::KEY_ARTIST_COST => 4884],
            '119_8064' => [self::KEY_VENDOR_PRICE => 5120, self::KEY_ARTIST_COST => 7104],
            '120_8068' => [self::KEY_VENDOR_PRICE => 7120, self::KEY_ARTIST_COST => 9879],
            '121_8070' => [self::KEY_VENDOR_PRICE => 11120, self::KEY_ARTIST_COST => 14595],
            '123_8042' => [self::KEY_VENDOR_PRICE => 1760, self::KEY_ARTIST_COST => 2640],
            '124_8047' => [self::KEY_VENDOR_PRICE => 2000, self::KEY_ARTIST_COST => 3000],
            '125_8054' => [self::KEY_VENDOR_PRICE => 4320, self::KEY_ARTIST_COST => 5994],
            '126_8057' => [self::KEY_VENDOR_PRICE => 4320, self::KEY_ARTIST_COST => 6480],
            '127_8061' => [self::KEY_VENDOR_PRICE => 6320, self::KEY_ARTIST_COST => 8611],
            '128_8065' => [self::KEY_VENDOR_PRICE => 7120, self::KEY_ARTIST_COST => 9701],
            '129_8043' => [self::KEY_VENDOR_PRICE => 2400, self::KEY_ARTIST_COST => 3510],
            '130_8048' => [self::KEY_VENDOR_PRICE => 3040, self::KEY_ARTIST_COST => 4408],
            '131_8055' => [self::KEY_VENDOR_PRICE => 5520, self::KEY_ARTIST_COST => 7452],
            '122_8071' => [self::KEY_VENDOR_PRICE => 13120, self::KEY_ARTIST_COST => 17220],
            '53_8591_7' => [self::KEY_VENDOR_PRICE => 4345, self::KEY_ARTIST_COST => 1440],
            '53_8791_5' => [self::KEY_VENDOR_PRICE => 5345, self::KEY_ARTIST_COST => 1440],
            '53_8904_6' => [self::KEY_VENDOR_PRICE => 5345, self::KEY_ARTIST_COST => 1440],
            '53_8897_8' => [self::KEY_VENDOR_PRICE => 4345, self::KEY_ARTIST_COST => 1440],
            '58_8893_1' => [self::KEY_VENDOR_PRICE => 2756, self::KEY_ARTIST_COST => 640],
            '58_8911_4' => [self::KEY_VENDOR_PRICE => 2106, self::KEY_ARTIST_COST => 640],
            '58_8915_2' => [self::KEY_VENDOR_PRICE => 2756, self::KEY_ARTIST_COST => 640],
            '58_8889_3' => [self::KEY_VENDOR_PRICE => 2106, self::KEY_ARTIST_COST => 640],
            '59_8916_2' => [self::KEY_VENDOR_PRICE => 3677, self::KEY_ARTIST_COST => 960],
            '59_8894_1' => [self::KEY_VENDOR_PRICE => 3677, self::KEY_ARTIST_COST => 960],
            '59_8890_3' => [self::KEY_VENDOR_PRICE => 2877, self::KEY_ARTIST_COST => 960],
            '59_8912_4' => [self::KEY_VENDOR_PRICE => 2877, self::KEY_ARTIST_COST => 960],
            '60_8792_5' => [self::KEY_VENDOR_PRICE => 5374, self::KEY_ARTIST_COST => 1680],
            '60_8592_7' => [self::KEY_VENDOR_PRICE => 4324, self::KEY_ARTIST_COST => 1680],
            '60_8898_8' => [self::KEY_VENDOR_PRICE => 4324, self::KEY_ARTIST_COST => 1680],
            '60_8905_6' => [self::KEY_VENDOR_PRICE => 5374, self::KEY_ARTIST_COST => 1680],
            '62_8913_4' => [self::KEY_VENDOR_PRICE => 3886, self::KEY_ARTIST_COST => 1840],
            '62_8891_3' => [self::KEY_VENDOR_PRICE => 3886, self::KEY_ARTIST_COST => 1840],
            '62_8917_2' => [self::KEY_VENDOR_PRICE => 4736, self::KEY_ARTIST_COST => 1840],
            '62_8895_1' => [self::KEY_VENDOR_PRICE => 4736, self::KEY_ARTIST_COST => 1840],
            '63_8901_8' => [self::KEY_VENDOR_PRICE => 4329, self::KEY_ARTIST_COST => 2320],
            '63_8908_6' => [self::KEY_VENDOR_PRICE => 5729, self::KEY_ARTIST_COST => 2320],
            '63_8596_7' => [self::KEY_VENDOR_PRICE => 4329, self::KEY_ARTIST_COST => 2320],
            '63_8796_5' => [self::KEY_VENDOR_PRICE => 5729, self::KEY_ARTIST_COST => 2320],
            '64_8910_6' => [self::KEY_VENDOR_PRICE => 7932, self::KEY_ARTIST_COST => 5145],
            '64_8603_7' => [self::KEY_VENDOR_PRICE => 5932, self::KEY_ARTIST_COST => 5145],
            '64_8803_5' => [self::KEY_VENDOR_PRICE => 7932, self::KEY_ARTIST_COST => 5145],
            '64_8903_8' => [self::KEY_VENDOR_PRICE => 5932, self::KEY_ARTIST_COST => 5145],
            '66_8892_3' => [self::KEY_VENDOR_PRICE => 5861, self::KEY_ARTIST_COST => 2520],
            '66_8896_1' => [self::KEY_VENDOR_PRICE => 6761, self::KEY_ARTIST_COST => 2520],
            '66_8914_4' => [self::KEY_VENDOR_PRICE => 5861, self::KEY_ARTIST_COST => 2520],
            '66_8918_2' => [self::KEY_VENDOR_PRICE => 6761, self::KEY_ARTIST_COST => 2520],
            '67_8906_6' => [self::KEY_VENDOR_PRICE => 5402, self::KEY_ARTIST_COST => 2880],
            '67_8793_5' => [self::KEY_VENDOR_PRICE => 5402, self::KEY_ARTIST_COST => 2880],
            '67_8593_7' => [self::KEY_VENDOR_PRICE => 4102, self::KEY_ARTIST_COST => 2880],
            '67_8899_8' => [self::KEY_VENDOR_PRICE => 4102, self::KEY_ARTIST_COST => 2880],
            '68_8800_5' => [self::KEY_VENDOR_PRICE => 8442, self::KEY_ARTIST_COST => 4080],
            '68_8909_6' => [self::KEY_VENDOR_PRICE => 8442, self::KEY_ARTIST_COST => 4080],
            '68_8600_7' => [self::KEY_VENDOR_PRICE => 6592, self::KEY_ARTIST_COST => 4080],
            '68_8902_8' => [self::KEY_VENDOR_PRICE => 6592, self::KEY_ARTIST_COST => 4080],
            '75_8594_7' => [self::KEY_VENDOR_PRICE => 4200, self::KEY_ARTIST_COST => 4928],
            '75_8794_5' => [self::KEY_VENDOR_PRICE => 5800, self::KEY_ARTIST_COST => 4928],
            '75_8900_8' => [self::KEY_VENDOR_PRICE => 4200, self::KEY_ARTIST_COST => 4928],
            '75_8907_6' => [self::KEY_VENDOR_PRICE => 5800, self::KEY_ARTIST_COST => 4928],
            '103_8864_8' => [self::KEY_VENDOR_PRICE => 4345, self::KEY_ARTIST_COST => 2000],
            '103_8751_5' => [self::KEY_VENDOR_PRICE => 5345, self::KEY_ARTIST_COST => 2000],
            '103_8551_7' => [self::KEY_VENDOR_PRICE => 4345, self::KEY_ARTIST_COST => 2000],
            '103_8871_6' => [self::KEY_VENDOR_PRICE => 5345, self::KEY_ARTIST_COST => 2000],
            '108_8885_2' => [self::KEY_VENDOR_PRICE => 2756, self::KEY_ARTIST_COST => 640],
            '108_8857_1' => [self::KEY_VENDOR_PRICE => 2756, self::KEY_ARTIST_COST => 640],
            '108_8850_3' => [self::KEY_VENDOR_PRICE => 2106, self::KEY_ARTIST_COST => 640],
            '108_8878_4' => [self::KEY_VENDOR_PRICE => 2106, self::KEY_ARTIST_COST => 640],
            '109_8886_2' => [self::KEY_VENDOR_PRICE => 3677, self::KEY_ARTIST_COST => 1040],
            '109_8879_4' => [self::KEY_VENDOR_PRICE => 2877, self::KEY_ARTIST_COST => 1040],
            '109_8858_1' => [self::KEY_VENDOR_PRICE => 3677, self::KEY_ARTIST_COST => 1040],
            '109_8851_3' => [self::KEY_VENDOR_PRICE => 2877, self::KEY_ARTIST_COST => 1040],
            '110_8752_5' => [self::KEY_VENDOR_PRICE => 5374, self::KEY_ARTIST_COST => 2320],
            '110_8872_6' => [self::KEY_VENDOR_PRICE => 5374, self::KEY_ARTIST_COST => 2320],
            '110_8552_7' => [self::KEY_VENDOR_PRICE => 4324, self::KEY_ARTIST_COST => 2320],
            '110_8865_8' => [self::KEY_VENDOR_PRICE => 4324, self::KEY_ARTIST_COST => 2320],
            '112_8880_4' => [self::KEY_VENDOR_PRICE => 3886, self::KEY_ARTIST_COST => 2160],
            '112_8887_2' => [self::KEY_VENDOR_PRICE => 4736, self::KEY_ARTIST_COST => 2160],
            '112_8852_3' => [self::KEY_VENDOR_PRICE => 3886, self::KEY_ARTIST_COST => 2160],
            '112_8859_1' => [self::KEY_VENDOR_PRICE => 4736, self::KEY_ARTIST_COST => 2160],
            '113_8868_8' => [self::KEY_VENDOR_PRICE => 4329, self::KEY_ARTIST_COST => 2720],
            '113_8556_7' => [self::KEY_VENDOR_PRICE => 4329, self::KEY_ARTIST_COST => 2720],
            '113_8875_6' => [self::KEY_VENDOR_PRICE => 5729, self::KEY_ARTIST_COST => 2720],
            '113_8756_5' => [self::KEY_VENDOR_PRICE => 5729, self::KEY_ARTIST_COST => 2720],
            '114_8870_8' => [self::KEY_VENDOR_PRICE => 5932, self::KEY_ARTIST_COST => 6313],
            '114_8877_6' => [self::KEY_VENDOR_PRICE => 7932, self::KEY_ARTIST_COST => 6313],
            '114_8763_5' => [self::KEY_VENDOR_PRICE => 7932, self::KEY_ARTIST_COST => 6313],
            '114_8563_7' => [self::KEY_VENDOR_PRICE => 5932, self::KEY_ARTIST_COST => 6313],
            '116_8853_3' => [self::KEY_VENDOR_PRICE => 5861, self::KEY_ARTIST_COST => 3219],
            '116_8860_1' => [self::KEY_VENDOR_PRICE => 6761, self::KEY_ARTIST_COST => 3219],
            '116_8888_2' => [self::KEY_VENDOR_PRICE => 6761, self::KEY_ARTIST_COST => 3219],
            '116_8860_4' => [self::KEY_VENDOR_PRICE => 5861, self::KEY_ARTIST_COST => 3219],
            '117_8553_7' => [self::KEY_VENDOR_PRICE => 4102, self::KEY_ARTIST_COST => 3774],
            '117_8866_8' => [self::KEY_VENDOR_PRICE => 4102, self::KEY_ARTIST_COST => 3774],
            '117_8873_6' => [self::KEY_VENDOR_PRICE => 5402, self::KEY_ARTIST_COST => 3774],
            '117_8753_5' => [self::KEY_VENDOR_PRICE => 5402, self::KEY_ARTIST_COST => 3774],
            '118_8876_6' => [self::KEY_VENDOR_PRICE => 8442, self::KEY_ARTIST_COST => 4884],
            '118_8560_7' => [self::KEY_VENDOR_PRICE => 6592, self::KEY_ARTIST_COST => 4884],
            '118_8869_8' => [self::KEY_VENDOR_PRICE => 6592, self::KEY_ARTIST_COST => 4884],
            '118_8760_5' => [self::KEY_VENDOR_PRICE => 8442, self::KEY_ARTIST_COST => 4884],
            '125_8874_6' => [self::KEY_VENDOR_PRICE => 5800, self::KEY_ARTIST_COST => 5994],
            '125_8554_7' => [self::KEY_VENDOR_PRICE => 4200, self::KEY_ARTIST_COST => 5994],
            '125_8867_8' => [self::KEY_VENDOR_PRICE => 4200, self::KEY_ARTIST_COST => 5994],
            '125_8754_5' => [self::KEY_VENDOR_PRICE => 5800, self::KEY_ARTIST_COST => 5994],
        ];

        $provider = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->findOneByShortName('jondo');
        foreach ($products as $legacyId => $values) {
            if (!is_array($values)) {
                $this->createProduct($provider, $legacyId, $values, null, $mappingToCosts);
            } else {
                if (count($values) > 1) {
                    foreach ($values as $value) {
                        if (!is_array($value)) {
                            $this->createProduct($provider, $legacyId, $value, null, $mappingToCosts);
                        } else {
                            $this->createProduct($provider, $legacyId, $value[1], $value[0], $mappingToCosts);
                        }
                    }
                }
            }
        }
    }

    protected function addUniversalProducts()
    {
        // legacyproductid => provider product id
        // legacyproductid => array (framing option, provider product id)
        $products = array(
            82  => 0,
            132 => 0
        );

        $mappingToCosts= [
            '82_0' => [self::KEY_VENDOR_PRICE => 1600, self::KEY_ARTIST_COST => 2100],
            '132_0' => [self::KEY_VENDOR_PRICE => 2100, self::KEY_ARTIST_COST => 2600],
        ];

        $provider = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->findOneByShortName('universal');
        foreach ($products as $legacyId => $values) {
            if (!is_array($values)) {
                $this->createProduct($provider, $legacyId, $values, null, $mappingToCosts);
            } else {
                if (count($values) > 1) {
                    foreach ($values as $value) {
                        if (!is_array($value)) {
                            $this->createProduct($provider, $legacyId, $value, null, $mappingToCosts);
                        } else {
                            $this->createProduct($provider, $legacyId, $value[1], $value[0], $mappingToCosts);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $providerEntity
     * @param $legacyProductId
     * @param $providerProductId
     * @param null $legacyFrameId
     * @param array $mappingToCosts
     */
    protected function createProduct(
        $providerEntity,
        $legacyProductId,
        $providerProductId,
        $legacyFrameId = null,
        array $mappingToCosts = array()
    ) {

        //create with basic filters
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery::create()
                 ->filterByFulfillmentProvider($providerEntity)
                 ->filterByProviderProductId($providerProductId)
                 ->filterByLegacyProductId($legacyProductId);

        //add options filter
        $option = $this->getOption($legacyFrameId, $legacyProductId);
        if ($option) {
            $query->filterByOption($option);
            $costKey = $legacyProductId . '_' . $providerProductId . '_' . $legacyFrameId;
        } else {
            $costKey = $legacyProductId . '_' . $providerProductId;
        }

        //add costs filter
        if (isset($mappingToCosts[$costKey])) {
            $currentCosts = $mappingToCosts[$costKey];
            $query->filterByVendorPrice($currentCosts[self::KEY_VENDOR_PRICE]);
            $query->filterByArtistCost($currentCosts[self::KEY_ARTIST_COST]);
        }

        $entity = $query->findOneOrCreate();

        if ($entity->isNew()) {
            $entity->save();
        }
    }

    /**
     * @param $legacyFrameId
     * @param $legacyProductId
     * @return null|ProjectA_Zed_Catalog_Persistence_PacCatalogOption
     */
    protected function getOption($legacyFrameId, $legacyProductId)
    {
        if ($legacyFrameId) {
            $optionType = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypeQuery::create()->findOneByName('frame');
            $newFrameId =
                Sao_Shared_Library_Legacy_FrameOptionMapping::mapLegacyFrameToCatalogFrame($legacyFrameId, $legacyProductId);
            return
                ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery::create()
                    ->filterByOptionType($optionType)
                    ->filterByIdentifier('F' . $newFrameId)
                    ->findOne();
        }
        return null;
    }
}
