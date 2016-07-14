<?php

use Codeception\Scenario;

class YvesAcceptanceTester extends AcceptanceTester
{

    /**
     * Tell WebDriver to execute url calls on yves
     * `$i->amOnPage('/foo/bar/baz');` will use yves host
     *
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $i = $this;
        $i->amYves();
    }

}
