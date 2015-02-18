<?php 

namespace Generated\Zed\Feed\Business\Dependency;

use ProjectA\Zed\Feed\Business\FeedFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait FeedFacadeTrait
{
    /**
     * @var FeedFacade
     */
    protected $facadeFeed;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeFeed(FacadeAbstract $facade)
    {
        $this->facadeFeed = $facade;
    }
}
