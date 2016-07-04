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

namespace Module;

<<<<<<< HEAD
class Yves extends Acceptance
=======
use Codeception\Module;

class Yves extends Module
>>>>>>> Cleaned up architecture
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
