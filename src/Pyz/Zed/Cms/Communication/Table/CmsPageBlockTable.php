<?php

namespace Pyz\Zed\Cms\Communication\Table;

use PavFeature\Zed\Cms\Communication\Table\CmsPageBlockTable as PavCmsPageBlockTable;

class CmsPageBlockTable extends PavCmsPageBlockTable
{

    /**
     * @return array
     */
    public function prepareConfig()
    {
        $config = parent::prepareConfig();
        $config['url'] = sprintf('page-block-table?id-page=%s', $this->idCmsPage);

        return $config;
    }
}
