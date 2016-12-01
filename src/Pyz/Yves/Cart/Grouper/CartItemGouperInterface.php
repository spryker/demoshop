<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */
namespace Pyz\Yves\Cart\Grouper;

use Generated\Shared\Transfer\QuoteTransfer;

interface CartItemGouperInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function groupCartItems(QuoteTransfer $quoteTransfer);
}
