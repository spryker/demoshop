<?php

namespace Pyz\Zed\Acl\Communication\Grid;

use SprykerFeature\Zed\Ui\Dependency\Grid\AbstractGrid;

class UserGrid extends AbstractGrid
{
    /**
     * @return array
     */
    public function definePlugins()
    {
        $plugins = [
            $this->createDefaultRowRenderer(),
            $this->createPagination(),
            $this->createDefaultColumn()
                ->setName('username')
                ->filterable()
                ->sortable(),
            $this->createDefaultColumn()
                ->setName('first_name')
                ->filterable()
                ->sortable(),
            $this->createDefaultColumn()
                ->setName('last_name')
                ->filterable()
                ->sortable(),
            $this->createDefaultColumn()
                ->setName('group_name')
                ->filterable()
                ->sortable()
        ];

        return $plugins;
    }

}