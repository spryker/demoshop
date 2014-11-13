<?php


namespace Pyz\Zed\Mail\Component\Model\Provider\Mandrill\Mapper;

use Generated\Shared\Mail\Transfer\Mail as MailTransfer;

/**
 * Class CustomerMapper
 * @package Zoo\Zed\Mail\Component\Model\Provider\Mandrill\Mapper
 */
abstract class CustomerMapper extends DefaultMapper
{
    /**
     * @param MailTransfer $mailTransfer
     * @return mixed
     */
    public function transformTransferToArray(MailTransfer $mailTransfer)
    {
        $allowedData = array_intersect_key($mailTransfer->getData(), array_flip($this->getAllowedFields()));

        return $this->buildVariables($allowedData);
    }

    /**
     * @return array
     */
    protected function getAllowedFields()
    {
        return [
            'yves_url',
            'salutation',
            'first_name',
            'last_name',
        ];
    }
}
 