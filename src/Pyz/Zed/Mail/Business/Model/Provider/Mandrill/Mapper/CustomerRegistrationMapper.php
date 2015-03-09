<?php


namespace Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper;

/**
 * Class DefaultMapper
 * @package Zoo\Zed\Mail\Component\Model\Provider\Mandrill\Mapper
 */
class CustomerRegistrationMapper extends CustomerMapper
{
    /**
     * @return array
     */
    protected function getAllowedFields()
    {
        $allowedFields = parent::getAllowedFields();
        $allowedFields[] = 'account_confirmation_url';

        return $allowedFields;
    }
}
 