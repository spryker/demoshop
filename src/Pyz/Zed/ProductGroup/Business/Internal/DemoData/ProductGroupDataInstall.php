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
        $productGroupTransfer->setGlossaryKey('product-group.key.weight');
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
        $productGroupTransfer->setGlossaryKey('product-group.key.carbs');
        $productGroupId = $this->productGroupFacade->saveProductGroup($productGroupTransfer);

        $productGroupValues = [
            'no' => 'product-group.carbs.value.no',
            'rice' => 'product-group.carbs.value.rice',
            'potatoes' => 'product-group.carbs.value.potatoes',
        ];

        $sequence = 0;
        foreach ($productGroupValues as $value => $glossaryKey) {
            $sequence++;
            $productGroupValue = new ProductGroupValueTransfer();
            $productGroupValue
                ->setSequence($sequence)
                ->setFkProductGroup($productGroupId)
                ->setType('string')
                ->setValue($value)
                ->setGlossaryKey($glossaryKey);
            $this->productGroupFacade->saveProductGroupValue($productGroupValue);
        }
    }

    protected function installMeatTypes()
    {
        $productGroupTransfer = new ProductGroupTransfer();
        $productGroupTransfer->setKey('meat');
        $productGroupTransfer->setGlossaryKey('product-group.key.meat');
        $productGroupId = $this->productGroupFacade->saveProductGroup($productGroupTransfer);


        $productGroupValues = [
            'chicken' => 'product-group.meat.chicken',
            'kangaroo' => 'product-group.meat.kangaroo',
            'beef' => 'product-group.meat.beef',
            'deer' => 'product-group.meat.deer',
            'fish' => 'product-group.meat.fish',
            'turkey' => 'product-group.meat.turkey',
        ];

        $sequence = 0;
        foreach ($productGroupValues as $value => $glossaryKey) {
            $sequence++;
            $productGroupValue = new ProductGroupValueTransfer();
            $productGroupValue
                ->setSequence($sequence)
                ->setFkProductGroup($productGroupId)
                ->setType('string')
                ->setGlossaryKey($glossaryKey)
                ->setValue($value);
            $this->productGroupFacade->saveProductGroupValue($productGroupValue);
        }
    }

}
