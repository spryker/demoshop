<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\Kernel\Application;

/**
 * @method \Pyz\Yves\Twig\TwigFactory getFactory()
 */
class TwigYves extends AbstractPlugin
{
    /**
     * @param \Spryker\Yves\Kernel\Application $application
     *
     * @return \Twig_Extension
     */
    public function getTwigYvesExtension(Application $application)
    {
        return $this->getFactory()
            ->createYvesTwigExtension($application);
    }
}
