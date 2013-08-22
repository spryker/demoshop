<?php
class Sao_Yves_Customer_Component_Model_Helper
{
    const PARAM_PAGE = 'page';
    const PARAM_ITEMS_PER_PAGE = 'ipp';

    public static function getUrl($baseUrl, $params = array(), $replaceKey = false, $replaceValue = false)
    {

        //replace specific parameter
        if ($replaceKey && $replaceValue) {
            $params[$replaceKey] = $replaceValue;
        }

        //remove specific parameter
        if ($replaceKey && !$replaceValue) {
            unset($params[$replaceKey]);
        }

        //no directory element set?
        if (empty($baseUrl)) {
            $baseUrl = '/customer';
        }

        $baseUrl .= '/?';

        if (!empty($params)) {
            foreach ($params as $param => $value) {
                $baseUrl .= '&' . $param . '=' . $value;
            }
        }

        $baseUrl = str_replace('?&', '?', $baseUrl);
        $baseUrl = rtrim($baseUrl, '?');

        return $baseUrl;
    }
}