<?php

namespace Pyz\Zed\Sales\Component\ConstantsInterface;

interface Orderprocess extends \ProjectA_Zed_Sales_Component_Interface_OrderprocessConstant
{
    // DEMO PROCESS
    const ORDER_PROCESS_DEMO = 'demo';

    // STATES

    // EVENTS

    // RULES

    // FLAGS

    /****** ONLY USED FOR THE TEST SUB-PROCESS ******/

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
