<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\HelloSpryker\Business\HelloSprykerFacade getFacade()
 */
class HelloSprykerController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction()
    {
        $message = $this->getFacade()
            ->getMessage();

        return [
            'reversedString' => $message,
        ];
    }
}
