<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
interface Sao_Zed_Fulfillment_Component_Model_Sba_Constants
{
    const TRACKING_STATUS_PICKED_UP_AND_IN_TRANSIT = 'AF';
    const TRACKING_STATUS_CONFIRMED_AND_ON_BOARD   = 'AJ';
    const TRACKING_STATUS_MISSED_PICKUP            = 'AP';
    const TRACKING_STATUS_PICKED_UP_AND_ON_HAND    = 'AV';
    const TRACKING_STATUS_PICKUP_SCHEDULED         = 'BA';
    const TRACKING_STATUS_PROOF_OF_DELIVERY        = 'D1';
    const TRACKING_STATUS_CUSTOMS_DELAY            = 'PR';
    const TRACKING_STATUS_OUT_FOR_DELIVERY         = 'X6';
    const TRACKING_STATUS_ALL_FREE_FORM            = 'FF';
}
