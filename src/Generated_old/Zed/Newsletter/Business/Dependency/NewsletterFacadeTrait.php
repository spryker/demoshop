<?php 

namespace Generated\Zed\Newsletter\Business\Dependency;

use ProjectA\Zed\Newsletter\Business\NewsletterFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait NewsletterFacadeTrait
{
    /**
     * @var NewsletterFacade
     */
    protected $facadeNewsletter;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeNewsletter(FacadeAbstract $facade)
    {
        $this->facadeNewsletter = $facade;
    }
}
