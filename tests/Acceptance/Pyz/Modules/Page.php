<?php
/**
 * Created by PhpStorm.
 * User: marynaglukhodid
 * Date: 30/06/16
 * Time: 13:50
 */

namespace tests\Acceptance\Pyz\Modules;

use \AcceptanceTester as AcceptanceTester;

class Page
{
    /** @var AcceptanceTester */
    protected $actor;

    /**
     * @param $scenario
     */
    protected function __construct($scenario)
    {
        $this->actor = new AcceptanceTester($scenario);
    }

    /**
     * @param \Codeception\Scenario $scenario
     * @return self
     */
    public static function of($scenario) {
        return new self($scenario);
    }

    /**
     * @param string $message
     * @return $this
     */
    public function wantTo($message)
    {
        $this->actor->wantTo($message);

        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function amGoingTo($message)
    {
        $this->actor->amGoingTo($message);

        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function expect($message)
    {
        $this->actor->expect($message);
        
        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function assertMessageBySelector($message, $selector)
    {
        $this->actor->see($message, $selector);

        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function assertNoMessageBySelector($message, $selector)
    {
        $this->actor->dontSee($message, $selector);

        return $this;
    }

}