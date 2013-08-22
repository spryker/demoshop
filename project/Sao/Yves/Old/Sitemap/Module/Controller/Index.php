<?php

class Sao_Yves_Transactionstatus_Module_Controller_Index extends Sao_Yves_Library_Base_Controller
{
    /**
     * Output the robots.txt file using CURL (from static server)
     */
    public function actionRobots()
    {
//        $mainConfig = ProjectA_Shared_Library_Config::get();
//        $storeName = ProjectA_Shared_Library_Store::getInstance()->getStoreName();
//        $robotsUri = 'http://' . $mainConfig->url->static_media . '/' . $storeName . $mainConfig->yves->url_prefixes->sitemap->path_prefix . 'robots.txt';
//
//        header('Content-Type: text/plain');
//
//        if (false === $con = curl_init($robotsUri)) {
//            Yii::app()->end();
//        }
//
//        curl_setopt($con, CURLOPT_USERAGENT, 'Yves');
//        curl_setopt($con, CURLOPT_HEADER, false);
//        curl_setopt($con, CURLOPT_FAILONERROR, true);
//        curl_exec($con);
//        curl_close($con);
//
//        Yii::app()->end();
    }

    /**
     * Redirect to sitemap on static server
     * @param string $sitemap
     */
    public function actionSitemap($sitemap)
    {
        if (preg_match('/^[A-Za-z0-9._-]+$/D', $sitemap)) {
            $mainConfig = ProjectA_Shared_Library_Config::get();
            $storeName = ProjectA_Shared_Library_Store::getInstance()->getStoreName();
            $sitemapUri = 'http://' . $mainConfig->url->static_media . '/' . $storeName . $mainConfig->yves->url_prefixes->sitemap->path_prefix . $sitemap;

            header('HTTP/1.1 303 See Other');
            header("Location: $sitemapUri");

            ProjectA_Yves_Library_Yii::app()->end();
        }
    }
}