<?php

class Sao_Yves_Cms_Component_Model_ControllerHelper
{

    /**
     * @var array
     */
    protected $cmsPage;

    /**
     * @var null|string
     */
    protected $banner = null;

    /**
     * @var null|string
     */
    protected $bannerText = null;

    /**
     * @var null|string
     */
    protected $seoTextLeft = null;

    /**
     * @var null|string
     */
    protected $seoTextRight = null;

    /**
     * @var null|string
     */
    protected $seoTextBottom = null;

    public function __construct(Sao_Yves_Library_Base_Controller $controller)
    {
        header('X-Cms: 1');
    }

    public function setCmsPage($cmsPage)
    {
        $this->cmsPage = $cmsPage;
    }

    /**
     * @return null|string
     */
    public function getBanner()
    {
        if (isset($this->cmsPage['elements']['banner']) && !empty($this->cmsPage['elements']['banner'])) {
            $this->banner = $this->cmsPage['elements']['banner'];
        }
        return $this->banner;
    }

    /**
     * @return null|string
     */
    public function getBannerText()
    {
        if (isset($this->cmsPage['elements']['bannertext']) && !empty($this->cmsPage['elements']['bannertext'])) {
            $this->bannerText = $this->cmsPage['elements']['bannertext'];
        }
        return $this->bannerText;
    }

    /**
     * @return null|string
     */
    public function getSeoTextRight()
    {
        if (isset($this->cmsPage['elements']['seotextright']) && !empty($this->cmsPage['elements']['seotextright'])) {
            $this->seoTextRight = $this->cmsPage['elements']['seotextright'];
        }
        return $this->seoTextRight;
    }

    /**
     * @return null|string
     */
    public function getSeoTextLeft()
    {
        if (isset($this->cmsPage['elements']['seotextleft']) && !empty($this->cmsPage['elements']['seotextleft'])) {
            $this->seoTextLeft = $this->cmsPage['elements']['seotextleft'];
        }
        return $this->seoTextLeft;
    }

    /**
     * @return null|string
     */
    public function getSeoTextBottom()
    {
        if (isset($this->cmsPage['elements']['seotextbottom']) && !empty($this->cmsPage['elements']['seotextbottom'])) {
            $this->seoTextBottom = $this->cmsPage['elements']['seotextbottom'];
        }
        return $this->seoTextBottom;
    }

}
