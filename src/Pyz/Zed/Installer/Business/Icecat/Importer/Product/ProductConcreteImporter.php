<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Pyz\Zed\Installer\Business\Icecat\Importer\AbstractIcecatImporter;
use Pyz\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductConcreteImporter extends ProductAbstractImporter
{
}
