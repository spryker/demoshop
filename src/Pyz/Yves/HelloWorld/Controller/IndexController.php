<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\HelloWorld\Controller;

use Pyz\Yves\Application\Controller\AbstractController;

/**
 * Class IndexController
 * @package Pyz\Yves\HelloWorld\Controller
 */
class IndexController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction()
    {
        return [
            'helloWorld' => 'Hello World',
        ];
    }
}
