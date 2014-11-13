<?php

namespace Pyz\Zed\Mail\Component\Model\Provider\Mandrill\Mapper;

/**
 * Class DefaultMapper
 * @package Zoo\Zed\Mail\Component\Model\Provider\Mandrill\Mapper
 */
class CustomerPasswordForgottenMapper extends CustomerMapper
{
    /**
     * @return array
     */
    protected function getAllowedFields()
    {
        $allowedFields = parent::getAllowedFields();
        $allowedFields[] = 'restore_password_finish_url';

        return $allowedFields;
    }
}
 