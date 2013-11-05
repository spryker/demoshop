<?php
namespace Pyz\Yves\Application\Module\Controller;

use ProjectA\Shared\Glossary\Code\Storage\StorageKeyGenerator;
use ProjectA\Yves\Library\Controller\Controller;

class StaticController extends Controller
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $routeName = $this->request->attributes->get('_route');
        $keyName = 'static.pages.' . $routeName;
        $content = $this->app->trans($keyName);

        return [
            'data' => $content
        ];
    }
}
