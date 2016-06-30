<?php
/**
 * Created by PhpStorm.
 * User: marynaglukhodid
 * Date: 30/06/16
 * Time: 13:49
 */

namespace tests\Acceptance\Pyz\Modules\__FOLDER__;

/**
 * Class __NAME__
 * @package Acceptance\Pyz\Modules
 *
 */
class __NAME__ extends Page
{

    /**
     * @param \Codeception\Scenario $scenario
     * @return __NAME__
     */
    public static function of($scenario) {
        return new __NAME__($scenario);
    }


    /**
     * @return $this
     */
    public function __METHOD___(/*  PARAMS */)
    {
        // actions //

        return $this;
    }    
}