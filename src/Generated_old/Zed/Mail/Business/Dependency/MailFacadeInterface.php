<?php 

namespace Generated\Zed\Mail\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface MailFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeMail(FacadeAbstract $facade);

}
