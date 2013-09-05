<?php

class Sao_Yves_Library_Base_Helper
{

    const PARAM_PAGE = 'page';

    const PARAM_ITEMS_PER_PAGE = 'ipp';


    /**
     * @param $page
     * @param array $params
     * @param bool $replaceKey
     * @param bool $replaceValue
     * @return string
     */
    public static function getUrl($page, $params = array(), $replaceKey = false, $replaceValue = false)
    {

        //replace specific parameter
        if ($replaceKey && $replaceValue) {
            $params[$replaceKey] = $replaceValue;
        }

        //remove specific parameter
        if ($replaceKey && !$replaceValue) {
            unset($params[$replaceKey]);
        }

        //remove page param if not requested
        if ($replaceKey != Sao_Yves_Library_Base_Helper::PARAM_PAGE) {
            unset($params[Sao_Yves_Library_Base_Helper::PARAM_PAGE]);
        }

        $url = $page . '/?';

        if (!empty($params)) {
            foreach ($params as $param => $value) {
                $url .= '&' . $param . '=' . $value;
            }
        }

        $url = str_replace('?&', '?', $url);
        $url = rtrim($url, '?');

        return $url;
    }
}