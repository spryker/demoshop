<?php
namespace Pyz\Zed\Mail\Business\Model;

use ProjectA\Zed\Mail\Business\Model\MailTypesConstantInterface as CoreMailTypesConstantInterface;

interface MailTypesConstantInterface extends CoreMailTypesConstantInterface
{
    //TODO add real mail types later
    const JUST_FOR_TESTING = 'just_for_testing';

    const UNDERPAID_CONFIRMATION = 'underpayment_received';
}
