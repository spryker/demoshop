<?php

namespace Pyz\Zed\Acl\Communication\Grid;

use ProjectA\Zed\Ui\Dependency\Grid\AbstractGrid;

class UsersWithGroupGrid extends AbstractGrid
{
    /**
     * @return array
     */
    public function definePlugins()
    {
        $plugins = [
            $this->locator->ui()->pluginGridDefaultRowsRenderer(),
            $this->locator->ui()->pluginGridPagination(),
            $this->locator->ui()->pluginGridDefaultColumn()
                ->setName('username')
                ->filterable()
                ->sortable(),
            $this->locator->ui()->pluginGridDefaultColumn()
                ->setName('first_name')
                ->filterable()
                ->sortable(),
            $this->locator->ui()->pluginGridDefaultColumn()
                ->setName('last_name')
                ->filterable()
                ->sortable(),
            $this->locator->ui()->pluginGridDefaultColumn()
                ->setName('group_name')
                ->filterable()
                ->sortable()
        ];

        return $plugins;
    }

}