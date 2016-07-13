<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Module;

class Yves extends Acceptance
{

    /**
     * @return $this
     */
    public function amYves()
    {
        $this->getModule('WebDriver')->_reconfigure(['url' => 'http://www.de.spryker.dev']);

        return $this;
    }

}
