<?php 

namespace Generated\Zed\Newsletter\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface NewsletterFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeNewsletter(FacadeAbstract $facade);

}
