<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Cms;

use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Orm\Zed\Product\Persistence\SpyProductAttributesMetadataQuery;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CmsBlockImporter extends AbstractIcecatImporter
{

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Block';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return true;
        $query = SpyProductSearchQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     */
    public function importOne(array $data)
    {
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @return void
     */
    protected function before()
    {

    }


}
