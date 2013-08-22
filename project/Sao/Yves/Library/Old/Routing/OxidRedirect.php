<?php
/**
 *
 * Old Oxid urls resulting in 404 pages, so we try to adjust the url to new format generically
 *
 * OLD format:  http://www.tirendo.de/PKW/Reifen/Sommerreifen/DUNLOP-SP-SPORT-FASTRESPONSE-XL-tirendo-5.html
 * NEW format:  http://www.tirendo.de/PKW/Reifen/Sommerreifen/DUNLOP/SP%20SPORT%20FASTRESPONSE%20XL
 *
 */
class Sao_Yves_Library_Routing_OxidRedirect
{

    /**
     * first part of manufacturers, that contain a whitespace
     * (hardcoded is not a problem, because old oxid manufacturers can't be changed anymore; so no new entries ever)
     * @var array
     */
    protected $whitespaceManufacturer = array('BF','CHENG','DOUBLE','FULL','GENERAL','GT','MICKEY','NEXT','STAR','VEE');


    /**
     * @param string $url
     * @return string
     */
    public function getCategoryRedirectUrl($url)
    {
        return $this->convertCategoryUrlFormat($url);
    }

    /**
     * @param string $url
     * @return string
     */
    protected function convertCategoryUrlFormat($url)
    {
        $urlParams = $this->extractParameterFromUrl($url);

        if (in_array(strtoupper($urlParams[0]), $this->whitespaceManufacturer)) {
            $manufacturer = $urlParams[0] . '-' . $urlParams[1];
            unset($urlParams[1]);
        } else {
            $manufacturer = $urlParams[0];
        }
        unset($urlParams[0]);
        $tread = $this->joinRemainingElements($urlParams);

        $urlNewParts = array($manufacturer, $tread);
        return implode('/', $urlNewParts);
    }

    /**
     * @param string $url
     * @return array
     */
    protected function extractParameterFromUrl($url)
    {
        $url = str_replace('.html', '', $url);
        $url = explode('/', $url);
        $url = end($url);
        $urlLast = substr($url, 0, stripos($url, '-tirendo'));
        return explode('-', $urlLast);
    }

    /**
     * @param array $urlParams
     * @return string
     */
    protected function joinRemainingElements(array $urlParams)
    {
        return implode('-', $urlParams);
    }

}