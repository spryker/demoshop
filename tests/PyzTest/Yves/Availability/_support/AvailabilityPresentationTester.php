<?php

namespace PyzTest\Yves\Availability;

use Codeception\Actor;
use Codeception\Scenario;

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
class AvailabilityPresentationTester extends Actor
{

    use _generated\AvailabilityPresentationTesterActions;

    const FUJITSU_PRODUCT_PAGE = '/en/fujitsu-esprimo-e420-118';
    const FUJITSU2_PRODUCT_PAGE = 'en/fujitsu-esprimo-e920-119';

    const CART_PRE_CHECK_AVAILABILITY_ERROR_MESSAGE = 'The availability of product 119_29804808 is 10 at the moment.';

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->amYves();
    }

    /**
     * @return void
     */
    public function processCheckout()
    {
        $this->processAllCheckoutSteps();
    }

}
