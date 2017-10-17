<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\NavigationGui\PageObject;

class NavigationPage
{
    const URL = '/navigation-gui';
    const PAGE_LIST_TABLE_XPATH = '//*[@class="dataTables_scrollBody"]/table/tbody/tr[1]/td[1]';
    const MESSAGE_TREE_UPDATE_SUCCESS = 'Navigation tree updated successfully.';
}
