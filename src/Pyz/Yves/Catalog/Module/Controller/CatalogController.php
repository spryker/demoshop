<?php
namespace Pyz\Yves\Catalog\Module\Controller;

use ProjectA\Yves\Catalog\Module\Controller\CatalogController as CoreCatalogController;
use ProjectA\Yves\Catalog\Component\Model\Category;
use Pyz\Yves\Catalog\Component\Model\FacetConfig;
use Pyz\Yves\Catalog\Component\Model\FacetSearch;

class CatalogController extends CoreCatalogController
{
    public function indexAction()
    {
        $search = new FacetSearch($this->request);
        $result = $search->getResult();

//        //TODO: remove this debug output
//        echo PHP_EOL.'<hr /><pre>'; var_dump($result); echo __CLASS__.' '.__FILE__ . ':'.__LINE__.''; echo '</pre><hr />'.PHP_EOL; exit();

        return $result;
    }
}
