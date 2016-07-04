<?php

/**
<<<<<<< HEAD
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
=======
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
>>>>>>> Cleaned up architecture
 */

namespace Acceptance\Login\Zed\Tester;

use Acceptance\Login\Zed\PageObject\LoginPage;

class LoginTester extends \ZedAcceptanceTester
{

    /**
     * @param string $username
     * @param string $password
     *
     * @return $this
     */
    public function doLogin($username, $password)
    {
        $i = $this;
        $i->amOnPage(LoginPage::URL);
        $i->fillField(LoginPage::SELECTOR_USERNAME_FIELD, $username);
        $i->fillField(LoginPage::SELECTOR_PASSWORD_FIELD, $password);
        $i->click(LoginPage::SELECTOR_SUBMIT_BUTTON);

        return $this;
    }

}
