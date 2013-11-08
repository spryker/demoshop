<?php
namespace Pyz\Zed\Mail\Component\Model;

use ProjectA\Zed\Mail\Component\Model\MailTypesConstantInterface as CoreMailTypesConstantInterface;

interface MailTypesConstantInterface extends CoreMailTypesConstantInterface
{
    //TODO add real mail types later
    const JUST_FOR_TESTING = 'just_for_testing';
}
