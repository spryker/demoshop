<?php

namespace Pyz\Shared\Cart\Messages;

use Pyz\SprykerBugfixInterface;
use SprykerFeature\Shared\Cart\Messages\Messages as SpyMessages;

class Messages extends SpyMessages implements SprykerBugfixInterface
{
    const EXPENSE_ADD_SUCCESS = 'cart.expense.add.success';
    const EXPENSE_REMOVE_SUCCESS = 'cart.expense.remove.success';
}
