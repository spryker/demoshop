<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;

abstract class BaseStep implements StepInterface
{

    /**
     * @var string
     */
    protected $stepRoute;

    /**
     * @var string
     */
    protected $escapeRoute;

    /**
     * @var string
     */
    protected $externalRedirectUrl;

    /**
     * @var FlashMessengerInterface
     */
    protected $flashMessenger;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(FlashMessengerInterface $flashMessenger, $stepRoute, $escapeRoute)
    {
        $this->stepRoute = $stepRoute;
        $this->escapeRoute = $escapeRoute;
        $this->flashMessenger = $flashMessenger;
    }

    /**
     * @return string
     */
    public function getStepRoute()
    {
        return $this->stepRoute;
    }

    /**
     * @return string
     */
    public function getEscapeRoute()
    {
        return $this->escapeRoute;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isCartEmpty(QuoteTransfer $quoteTransfer)
    {
        return count($quoteTransfer->getItems()) === 0;
    }

    /**
     * @return string
     */
    public function getExternalRedirectUrl()
    {
        return $this->externalRedirectUrl;
    }

    /**
     * @return array
     */
    public function getTemplateVariables()
    {
        return [];
    }

}
