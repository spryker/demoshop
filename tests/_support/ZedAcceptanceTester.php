<?php

use Codeception\Scenario;

class ZedAcceptanceTester extends AcceptanceTester
{

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $i = $this;
        $i->amZed();
    }

}
