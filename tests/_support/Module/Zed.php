<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Module;

class Zed extends Acceptance
{

    /**
     * @return $this
     */
    public function amZed()
    {
        $this->getModule('WebDriver')->_reconfigure(['url' => 'http://zed.de.spryker.dev']);

        return $this;
    }

}
