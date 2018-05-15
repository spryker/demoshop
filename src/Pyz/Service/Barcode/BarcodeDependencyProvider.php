<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Service\Barcode;

use Spryker\Service\Barcode\BarcodeDependencyProvider as SprykerDependencyProvider;
use Spryker\Service\CodeItNow\Plugin\Code128BarcodeGeneratorPlugin;

class BarcodeDependencyProvider extends SprykerDependencyProvider
{
    /**
     * @return \Spryker\Service\BarcodeExtension\Dependency\Plugin\BarcodeGeneratorPluginInterface[]
     */
    protected function getBarcodeGeneratorPlugins(): array
    {
        return [
            new Code128BarcodeGeneratorPlugin(), #ProductBarcodeFeature
        ];
    }
}
