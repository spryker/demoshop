<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Sales\Business\ConstantsInterface;

use Spryker\Zed\Sales\Business\OrderProcess\OrderprocessConstant;

interface Orderprocess extends OrderprocessConstant
{
    /************************************************************************************************
     *     GENERAL
     ************************************************************************************************/

    // --- GENERAL States

    public const STATE_INVALID = 'invalid';
    public const STATE_COMPLETED_BUT_REVERSIBLE = 'completed but reversible';
    public const STATE_FINALLY_COMPLETED = 'finally completed';

    // --- GENERAL Flags

    public const FLAG_CLARIFY = 'clarify';
    public const FLAG_READY_FOR_INVOICE = 'ready for invoice';
    public const FLAG_EXCLUDE_FROM_INVOICE = 'exclude from invoice';
    public const FLAG_ITEM_READY_FOR_EXPORT = 'item ready for export';
    public const FLAG_ITEM_EXPORTED = 'item exported';
    public const FLAG_RESERVED = 'reserved';

    /************************************************************************************************
     *     INVOICE CREATION
     ************************************************************************************************/

    public const STATE_INIT_INVOICE_CREATION_PROCESS = 'init invoice creation process';
    public const STATE_READY_FOR_INVOICE_CREATION = 'ready for invoice creation';
    public const STATE_INVOICE_CREATED = 'invoice created';

    public const RULE_INVOICE_CREATION_POSSIBLE = 'invoice creation possible';

    /************************************************************************************************
     *     FULFILLMENT
     ************************************************************************************************/

    public const STATE_INIT_FULFILLMENT_PROCESS = 'init fulfillment process';
    public const STATE_FULFILLED = 'fulfilled';

    public const EVENT_START_FULFILLMENT_EXPORT = 'start fulfillment export';

    /************************************************************************************************
     *     FULFILLMENT
     ************************************************************************************************/

    public const STATE_INIT_DUNNING = 'init dunning';

    /************************************************************************************************
     *     DEMO
     ************************************************************************************************/

    // states
    public const STATE_DEMO_A = 'DEMO A';
    public const STATE_DEMO_B = 'DEMO B';
    public const STATE_DEMO_C = 'DEMO C';
    public const STATE_DEMO_D = 'DEMO D';
    public const STATE_DEMO_E = 'DEMO E';
    public const STATE_DEMO_F = 'DEMO F';
    public const STATE_DEMO_G = 'DEMO G';
    public const STATE_DEMO_H = 'DEMO H';
    public const STATE_DEMO_I = 'DEMO I';

    // events
    public const EVENT_DEMO_START_TEST = 'DEMO Start Test';
    public const EVENT_DEMO_AB = 'DEMO Event AB';
    public const EVENT_DEMO_CHECK_FLAG = 'DEMO Event Check Flag';

    // rules
    public const RULE_DEMO_ORDER_GRAND_TOTAL_GREATER_THAN_1000 = 'DEMO Order GrandTotal Greater Than 1000';
    public const RULE_DEMO_ALL_ITEMS_ARE_IN_THE_FLAGGED_TEST_STATE = 'DEMO All Order Items Are In The Flagged Test State';

    // commands
    public const COMMAND_DEMO_TEST_ORDER_COMMAND_ONE = 'DEMO TEST ORDER COMMAND ONE';
    public const COMMAND_DEMO_TEST_ITEM_COMMAND_ONE = 'DEMO TEST ITEM COMMAND ONE';

    //flags
    public const FLAG_DEMO_TEST_FLAG = 'DEMO TEST FLAG';
}
