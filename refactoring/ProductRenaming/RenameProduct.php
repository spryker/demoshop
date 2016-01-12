<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Refactor\ProductRenaming;

use Spryker\Zed\Development\Business\Refactor\AbstractRefactor;
use Symfony\Component\Filesystem\Filesystem;

class RenameProduct extends AbstractRefactor
{

    /**
     * @return void
     */
    public function refactor()
    {
        $searchAndReplace = [
            'concrete_products' => 'product_concrete_collection',
            'concrete_product' => 'product_concrete',
            'ConcreteProducts' => 'ProductConcreteCollection',
            'ConcreteProduct' => 'ProductConcrete',
            'concreteProducts' => 'productConcreteCollection',
            'concreteProduct' => 'productConcrete',
            'Concrete product' => 'Product concrete',
            'concrete product' => 'product concrete',
            'abstract_products' => 'product_abstract_collection',
            'abstract_product' => 'product_abstract',
            'AbstractProducts' => 'ProductAbstractCollection',
            'AbstractProduct' => 'ProductAbstract',
            'abstractProducts' => 'productAbstractCollection',
            'abstractProduct' => 'productAbstract',
            'abstract product' => 'product abstract',
            'Abstract product' => 'Product abstract',
        ];

        $directories = [
            realpath(__DIR__ . '/../../src/Pyz'),
        ];

        $files = $this->getFiles($directories);
        $filesystem = new Filesystem();

        foreach ($files as $file) {
            $content = $file->getContents();
            $contentNew = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);

            $pathName = $file->getPathname();

            if ($content !== $contentNew) {
                echo 'Found difference in ' . $file->getFilename() . PHP_EOL;
                $filesystem->dumpFile($pathName, $contentNew);
            }
        }
    }

}
