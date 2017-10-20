<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Catalog\Price;

interface PriceIdentifierBuilderInterface
{
    /**
     * @return string
     */
    public function buildIdentifier();
}
