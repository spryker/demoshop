<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Shared_Mail_Transfer_ShippingInfoPrint extends Sao_Shared_Mail_Transfer_Order implements ProjectA_Shared_Mail_Transfer_Interface_Unique
{
    protected $artTitle;
    protected $_artTitle = array('is_string');

    protected $trackingUrls;
    protected $_trackingUrls = array('is_array');

    /**
     * @return mixed
     */
    public function getArtTitle()
    {
        return $this->artTitle;
    }

    /**
     * @param mixed $artTitle
     */
    public function setArtTitle($artTitle)
    {
        $this->artTitle = $artTitle;
    }

    /**
     * @return mixed
     */
    public function getTrackingUrls()
    {
        return $this->trackingUrls;
    }

    /**
     * @param mixed $trackingUrls
     */
    public function setTrackingUrls($trackingUrls)
    {
        $this->trackingUrls = $trackingUrls;
    }
}
