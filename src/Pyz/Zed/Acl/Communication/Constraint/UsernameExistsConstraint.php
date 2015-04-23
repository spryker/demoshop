<?php

namespace Pyz\Zed\Acl\Communication\Constraint;

use Generated\Zed\Ide\AutoCompletion;
use SprykerFeature\Shared\User\Messages\Messages;
use Symfony\Component\Validator\Constraint;

class UsernameExistsConstraint extends Constraint
{
    public $message = Messages::USER_EXISTS_ERROR;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var AutoCompletion
     */
    protected $locator;

    /**
     * @param string $username
     * @param AutoCompletion $locator
     * @param null $options
     */
    public function __construct(
        $username,
        $locator,
        $options = null
    ) {
        $this->username = $username;
        $this->locator = $locator;
        parent::__construct($options);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return AutoCompletion
     */
    public function getLocator()
    {
        return $this->locator;
    }
}
