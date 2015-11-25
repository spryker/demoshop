<?php

namespace Pyz\Zed\ProductGroup\Business\Internal\DemoData;

use Generated\Shared\Transfer\ProductGroupTransfer;
use Generated\Shared\Transfer\ProductGroupValueTransfer;
use Pyz\Zed\ProductGroup\Business\ProductGroupFacade;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class ProductGroupDataInstall extends AbstractInstaller
{

    protected $productGroupFacade;

    public function __construct(ProductGroupFacade $productGroupFacade)
    {
        $this->productGroupFacade = $productGroupFacade;
    }

    /**
     */
    public function install()
    {
        $this->info('This will install some demo products and related attributes');
        $this->installProductGroups();
    }

    protected function installProductGroups()
    {

        $this->installWeights();
        $this->installCarbs();
        $this->installMeatTypes();
    }

    protected function installWeights()
    {

        $productGroupTransfer = new ProductGroupTransfer();
        $productGroupTransfer->setKey('weight');
        $productGroupId = $this->productGroupFacade->saveProductGroup($productGroupTransfer);

        $productGroupValues = [
            '150g',
            '250g',
            '500g',
        ];

        foreach ($productGroupValues as $index => $value) {
            $sequence = $index + 1;
            $productGroupValue = new ProductGroupValueTransfer();
            $productGroupValue
                ->setSequence($sequence)
                ->setFkProductGroup($productGroupId)
                ->setType('string')
                ->setValue($value);
            $this->productGroupFacade->saveProductGroupValue($productGroupValue);
        }
    }

    protected function installCarbs()
    {
        $productGroupTransfer = new ProductGroupTransfer();
        $productGroupTransfer->setKey('carbs');
        $productGroupId = $this->productGroupFacade->saveProductGroup($productGroupTransfer);

        $productGroupValues = [
            'no',
            'rice',
            'potatoes',
        ];

        foreach ($productGroupValues as $index => $value) {
            $sequence = $index + 1;
            $productGroupValue = new ProductGroupValueTransfer();
            $productGroupValue
                ->setSequence($sequence)
                ->setFkProductGroup($productGroupId)
                ->setType('string')
                ->setValue($value);
            $this->productGroupFacade->saveProductGroupValue($productGroupValue);
        }
    }

    protected function installMeatTypes()
    {
        $productGroupTransfer = new ProductGroupTransfer();
        $productGroupTransfer->setKey('meat');
        $productGroupId = $this->productGroupFacade->saveProductGroup($productGroupTransfer);


        $productGroupValues = [
            'chicken',
            'kangaroo',
            'beef',
            'deer',
            'fish',
            'turkey',
        ];

        foreach ($productGroupValues as $index => $value) {
            $sequence = $index + 1;
            $productGroupValue = new ProductGroupValueTransfer();
            $productGroupValue
                ->setSequence($sequence)
                ->setFkProductGroup($productGroupId)
                ->setType('string')
                ->setValue($value);
            $this->productGroupFacade->saveProductGroupValue($productGroupValue);
        }
    }

}
