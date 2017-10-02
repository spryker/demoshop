<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\WebProfiler;

use Pyz\Shared\WebProfiler\WebProfilerConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class WebProfilerConfig extends AbstractBundleConfig
{

    /**
     * @return bool
     */
    public function isWebProfilerEnabled()
    {
        return $this->get(WebProfilerConstants::ENABLE_WEB_PROFILER, false);
    }

}
