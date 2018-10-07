<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\HelloSpryker\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Client\HelloSpryker\HelloSprykerClientInterface getClient()
 */
class HelloSprykerController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction(): array
    {
        $reversedStringTransfer = $this->getClient()
            ->getReversedString();

        return [
            'reversedStringTransfer' => $reversedStringTransfer,
        ];
    }
}
