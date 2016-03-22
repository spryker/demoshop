<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
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
     * @var \Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected $flashMessenger;

    /**
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
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
