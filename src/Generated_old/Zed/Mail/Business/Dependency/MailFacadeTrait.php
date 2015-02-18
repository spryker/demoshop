<?php 

namespace Generated\Zed\Mail\Business\Dependency;

use Pyz\Zed\Mail\Business\MailFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait MailFacadeTrait
{
    /**
     * @var MailFacade
     */
    protected $facadeMail;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeMail(FacadeAbstract $facade)
    {
        $this->facadeMail = $facade;
    }
}
