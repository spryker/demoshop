<?php

namespace tests\Acceptance\Pyz\Modules\Zed\Customer;

use tests\Acceptance\Pyz\Modules\Page;

/**
 * Class LoginZed
 *
 */
class LoginZed extends Page
{

    /**
     * @param \Codeception\Scenario $scenario
     * @return self
     */
    public static function of($scenario) {
        return new self($scenario);
    }
}