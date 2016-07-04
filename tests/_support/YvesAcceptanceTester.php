<?php

<<<<<<< HEAD
<<<<<<< HEAD
use Acceptance\Login\Zed\PageObject\LoginPage;

=======
>>>>>>> add acceptance test example

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class YvesAcceptanceTester extends \Codeception\Actor
{
<<<<<<< HEAD:tests/_support/AcceptanceTester.php
<<<<<<< HEAD

    use _generated\AcceptanceTesterActions;
    
=======
    use _generated\AcceptanceTesterActions;
=======
    use _generated\YvesAcceptanceTesterActions;
>>>>>>> allow yves and zed to be tested:tests/_support/YvesAcceptanceTester.php

   /**
    * Define custom actions here
    */
>>>>>>> add acceptance test example
=======
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

>>>>>>> Cleaned up architecture
}
