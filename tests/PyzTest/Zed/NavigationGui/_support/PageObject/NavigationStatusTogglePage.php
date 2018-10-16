<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\NavigationGui\PageObject;

class NavigationStatusTogglePage
{
    public const URL = '/navigation-gui/toggle-status?id-navigation=%d';
    public const MESSAGE_ACTIVE_SUCCESS = '/Navigation element (\d+) was activated successfully\\./';
}
