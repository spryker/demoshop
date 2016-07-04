<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> Cleaned up architecture
use Acceptance\Login\Zed\PageObject\LoginPage;
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
<<<<<<< HEAD
=======

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
class ZedAcceptanceTester extends \Codeception\Actor
{
    use _generated\ZedAcceptanceTesterActions;

   /**
    * Define custom actions here
    */
>>>>>>> allow yves and zed to be tested

    /**
     * @param string $username
     * @param string $password
     *
     * @return void
     */
<<<<<<< HEAD
=======

    /**
     * @param $username
     * @param $password
     *
     * @return void
     */
>>>>>>> Cleaned up architecture
    public function amLoggedInUser($username = 'admin@spryker.com', $password = 'change123')
    {
        $i = $this;

        // This currently fails: https://github.com/Codeception/Codeception/issues/2900
//        if ($i->loadSessionSnapshot('LoginZed')) {
//            return;
//        }

        $i->amOnPage(LoginPage::URL);

        $i->fillField(LoginPage::SELECTOR_USERNAME_FIELD, $username);
        $i->fillField(LoginPage::SELECTOR_PASSWORD_FIELD, $password);
        $i->click(LoginPage::SELECTOR_SUBMIT_BUTTON);

        $i->saveSessionSnapshot('LoginZed');
    }

<<<<<<< HEAD
=======
    public function iAmLoggedIn($username = 'admin@spryker.com', $password = 'change123')
    {
        $this->amOnPage('/auth/login');
        $this->fillField('auth[username]', $username);
        $this->fillField('auth[password]', $password);
        $this->click('Login');
    }
>>>>>>> allow yves and zed to be tested
=======
>>>>>>> Cleaned up architecture
}
