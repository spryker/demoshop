<?php

namespace Pyz\Zed\User\Communication\Form;

use SprykerFeature\Zed\User\Communication\Form\UserUpdateForm as SprykerUserUpdateForm;

class UserUpdateForm extends SprykerUserUpdateForm
{

    /**
     * @return self
     */
    protected function addRepeatedUserPassword()
    {
        $this->addRepeated(
            self::PASSWORD,
            [
                'invalid_message' => 'The password fields must match.',
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
                'required' => false,
                'type' => 'password',
            ]
        );

        return $this;
    }
}
