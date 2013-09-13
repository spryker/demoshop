<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Pyz_Shared_Mail_Transfer_CustomerForgotPassword extends Pyz_Shared_Mail_Transfer_Customer
{
    protected $restorePasswordKey = null;
    protected $_restorePasswordKey = array('is_string');

    public function setRestorePasswordKey($restorePasswordKey)
    {
        $this->restorePasswordKey = $restorePasswordKey;
    }

    public function getRestorePasswordKey()
    {
        return $this->restorePasswordKey;
    }


}
