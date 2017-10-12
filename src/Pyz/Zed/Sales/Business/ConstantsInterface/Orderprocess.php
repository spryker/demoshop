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

    const STATE_INVALID = 'invalid';
    const STATE_COMPLETED_BUT_REVERSIBLE = 'completed but reversible';
    const STATE_FINALLY_COMPLETED = 'finally completed';

    // --- GENERAL Flags

    const FLAG_CLARIFY = 'clarify';
    const FLAG_READY_FOR_INVOICE = 'ready for invoice';
    const FLAG_EXCLUDE_FROM_INVOICE = 'exclude from invoice';
    const FLAG_ITEM_READY_FOR_EXPORT = 'item ready for export';
    const FLAG_ITEM_EXPORTED = 'item exported';
    const FLAG_RESERVED = 'reserved';

    /************************************************************************************************
     *     INVOICE CREATION
     ************************************************************************************************/

    const STATE_INIT_INVOICE_CREATION_PROCESS = 'init invoice creation process';
    const STATE_READY_FOR_INVOICE_CREATION = 'ready for invoice creation';
    const STATE_INVOICE_CREATED = 'invoice created';

    const RULE_INVOICE_CREATION_POSSIBLE = 'invoice creation possible';

    /************************************************************************************************
     *     FULFILLMENT
     ************************************************************************************************/

    const STATE_INIT_FULFILLMENT_PROCESS = 'init fulfillment process';
    const STATE_FULFILLED = 'fulfilled';

    const EVENT_START_FULFILLMENT_EXPORT = 'start fulfillment export';

    /************************************************************************************************
     *     FULFILLMENT
     ************************************************************************************************/

    const STATE_INIT_DUNNING = 'init dunning';

    /************************************************************************************************
     *     DEMO
     ************************************************************************************************/

    // states
    const STATE_DEMO_A = 'DEMO A';
    const STATE_DEMO_B = 'DEMO B';
    const STATE_DEMO_C = 'DEMO C';
    const STATE_DEMO_D = 'DEMO D';
    const STATE_DEMO_E = 'DEMO E';
    const STATE_DEMO_F = 'DEMO F';
    const STATE_DEMO_G = 'DEMO G';
    const STATE_DEMO_H = 'DEMO H';
    const STATE_DEMO_I = 'DEMO I';

    // events
    const EVENT_DEMO_START_TEST = 'DEMO Start Test';
    const EVENT_DEMO_AB = 'DEMO Event AB';
    const EVENT_DEMO_CHECK_FLAG = 'DEMO Event Check Flag';

    // rules
    const RULE_DEMO_ORDER_GRAND_TOTAL_GREATER_THAN_1000 = 'DEMO Order GrandTotal Greater Than 1000';
    const RULE_DEMO_ALL_ITEMS_ARE_IN_THE_FLAGGED_TEST_STATE = 'DEMO All Order Items Are In The Flagged Test State';

    // commands
    const COMMAND_DEMO_TEST_ORDER_COMMAND_ONE = 'DEMO TEST ORDER COMMAND ONE';
    const COMMAND_DEMO_TEST_ITEM_COMMAND_ONE = 'DEMO TEST ITEM COMMAND ONE';

    //flags
    const FLAG_DEMO_TEST_FLAG = 'DEMO TEST FLAG';
}
