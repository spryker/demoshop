<?php

namespace Pyz\Shared\Sales\Transfer;

use Generated\Shared\Sales\Transfer\BaseOriginalNotification;

class OriginalNotification extends BaseOriginalNotification
{

    // Artist confirmed availability
    const RESULT_MESSAGE_CONFIRM = 'confirm';
    // Artist refute availability
    const RESULT_MESSAGE_REFUTE = 'refute';
    // Artist can not change from available to unavailable
    const RESULT_MESSAGE_INVALID_AVAILABLE_TO_UNAVAILABLE = 'from available to unavailable not allowed';
    // Artist can not change from unavailable to available
    const RESULT_MESSAGE_INVALID_UNAVAILABLE_TO_AVAILABLE = 'from unavailable to available not allowed';

    /**
     * @var string $hash
     */
    protected $hash;
    protected $_hash = array('is_string');

    /**
     * @var string $status
     */
    protected $status;
    protected $_status = array('is_string');

    /**
     * @var string
     */
    protected $resultMessage;
    protected $_resultMessage = array('is_string');
}
