<?php
namespace Pyz\Yves\Library\Tracking\Provider;

use ProjectA\Yves\Library\Tracking\Provider\ProviderInterface;
use ProjectA\Yves\Library\Tracking\Tracking;

class Optimizely implements ProviderInterface
{

    /**
     * @param array $dataProvider
     * @param $pageType
     * @return mixed|string
     */
    public function getTrackingOutput(array $dataProvider, $pageType)
    {
        return '<script src="//cdn.optimizely.com/js/432170435.js"></script>';
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return Tracking::POSITION_BEFORE_CLOSING_HEAD;
    }
}
