<?php
namespace Pyz\Yves\Application\Module\Controller;

use ProjectA\Yves\Library\Controller\Controller;
use ProjectA\Shared\Library\Storage\StorageInstanceBuilder;
use ProjectA\Yves\Catalog\Component\Model\Category;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{

    public function indexAction()
    {
        $kvStorage = StorageInstanceBuilder::getKvStorageReadInstance();
        return [
            'categories' => Category::getCategoryTree($kvStorage)
        ];
    }
}
