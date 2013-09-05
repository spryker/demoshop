<?php

class Sao_Zed_System_Component_Settings extends ProjectA_Zed_System_Component_Settings
{

    /**
     * @var array
     */
    protected $hostToIpAddressMapping = array(
        self::APP01 => '10.7.4.10',
        self::APP02 => '10.7.4.11',
        self::APP03 => '10.7.4.12',
    );

    /**
     * @param null|string $environment
     * @return array
     */
    public function getHosts($environment = null)
    {
        if (null === $environment) {
            $isProduction = ProjectA_Shared_Library_Environment::isProduction();
        } else {
            $isProduction = $environment == 'production';
        }

        if ($isProduction) {
            return array(
                array(
                    self::KEY_HOST => self::APP01,
                    self::KEY_ZED_PORT => '15061',
                    self::KEY_YVES_PORT => '15060',
                ),
                array(
                    self::KEY_HOST => self::APP02,
                    self::KEY_ZED_PORT => '15061',
                    self::KEY_YVES_PORT => '15060',
                ),
                array(
                    self::KEY_HOST => self::APP03,
                    self::KEY_ZED_PORT => '15061',
                    self::KEY_YVES_PORT => '15060',
                ),
            );
        } else {
            return array(
                array(
                    self::KEY_HOST => self::APP01,
                    self::KEY_ZED_PORT => '13061',
                    self::KEY_YVES_PORT => '13060',
                ),
                array(
                    self::KEY_HOST => self::APP02,
                    self::KEY_ZED_PORT => '13061',
                    self::KEY_YVES_PORT => '13060',
                ),
                array(
                    self::KEY_HOST => self::APP03,
                    self::KEY_ZED_PORT => '13061',
                    self::KEY_YVES_PORT => '13060',
                ),
            );
        }
    }

    /**
     * @return array
     */
    public function getNotificationEmailGroups()
    {
        return array(
            'alerts@natue.com.br',
        );
    }

    /**
     * @return array
     */
    public function getNotificationEmailSettings()
    {
        return array(
            ProjectA_Zed_System_Component_Model_Watchdog_Abstract::NOTIFICATION_FROM => 'watchdog@natue.com.br',
            ProjectA_Zed_System_Component_Model_Watchdog_Abstract::NOTIFICATION_SUBJECT => 'Natue Watchdog',
        );
    }

}
