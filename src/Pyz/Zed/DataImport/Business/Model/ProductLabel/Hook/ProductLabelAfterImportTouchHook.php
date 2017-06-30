<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductLabel\Hook;

use Spryker\Shared\ProductLabel\ProductLabelConstants;
use Spryker\Zed\DataImport\Business\Model\DataImporterAfterImportInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;

class ProductLabelAfterImportTouchHook implements DataImporterAfterImportInterface
{

    /**
     * @var \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface
     */
    protected $touchFacade;

    /**
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     */
    public function __construct(DataImportToTouchInterface $touchFacade)
    {
        $this->touchFacade = $touchFacade;
    }

    /**
     * @return void
     */
    public function afterImport()
    {
        $this->touchFacade->bulkTouchSetActive(
            ProductLabelConstants::RESOURCE_TYPE_PRODUCT_LABEL_DICTIONARY,
            [ProductLabelConstants::RESOURCE_TYPE_PRODUCT_LABEL_DICTIONARY_IDENTIFIER]
        );
    }

}
