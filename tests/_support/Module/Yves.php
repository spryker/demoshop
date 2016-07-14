<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
