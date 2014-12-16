<?php


namespace Pyz\Zed\Mail\Business\Model\Provider\Mandrill;

use Generated\Shared\Mail\Transfer\Mail;
use ProjectA\Zed\Mail\Business\Model\Provider\Mandrill\Factory as CoreFactory;
use Pyz\Zed\Mail\Business\Model\MailTypesConstantInterface;
use Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\CustomerPasswordForgottenMapper;
use Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\CustomerRegistrationMapper;
use Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\DefaultMapper;

/**
 * Class Factory
 * @package Zoo\Zed\Mail\Component\Model\Provider\Mandrill
 */
class Factory extends CoreFactory
{
    /**
     * @param Mail $transferObject
     * @return DefaultMapper
     */
    public function getMapperByTransfer(Mail $transferObject)
    {
        $transferType = $transferObject->getType();

        switch ($transferType) {
            case MailTypesConstantInterface::CUSTOMER_REGISTRATION:
                return new CustomerRegistrationMapper();
            case MailTypesConstantInterface::CUSTOMER_FORGOT_PASSWORD:
                return new CustomerPasswordForgottenMapper();
            default:
                return new DefaultMapper();
        }
    }
}
 