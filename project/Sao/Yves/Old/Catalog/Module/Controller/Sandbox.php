<?php

/**
 * Catalog
 */
class Sao_Yves_Catalog_Module_Controller_Sandbox extends Sao_Yves_Library_Base_Controller
{

    /**
     * Catalog Listing
     */
    public function actionIndex()
    {
        echo '<a href="/cart/index/add?sku=P1-U349912-A1429786">Add P1-U349912-A1429786 to cart (Original)</a><br>';
        echo '<a href="/cart/index/add?sku=P1-U349812-A1453579">Add P1-U349812-A1453579 to cart (Original)</a><br>';
        echo '<a href="/cart/index/add?sku=P1-U349912-A1429771">Add P1-U349912-A1429771 to cart (Original)</a><br>';
        echo '<a href="/cart/index/add?sku=P1-U349912-A1429772">Add P1-U349912-A1429772 to cart (Original)</a><br>';
        echo '<br />';
        echo '<a href="/cart/index/add?sku=P117-U349834-A207250">Add P117-U349834-A207250 to cart (Print, Rag)</a><br>';
        echo '<a href="/cart/index/add?sku=P15-U349912-A1429771">Add P15-U349912-A1429771 to cart (Print, Canvas, Black)</a><br>';
        echo '<a href="/cart/index/add?sku=P68-U349879-A222958">Add P68-U349879-A222958 to cart (Print, Photo)</a><br>';
        echo '<br />';
        echo '<a href="/cart/index/add?sku=P82-U175785-A194658-L">Add P82-U175785-A194658-L to cart (Print, Photo, Limited)</a><br>';
        echo '<br />';
        echo '<a href="/cart/index/add?sku=P67-U349879-A1532674-F5">Add P67-U349879-A1532674-F5 to cart (Print, Photo, Framed)</a><br>';
        echo '<a href="/cart/index/add?sku=P67-U349879-A1532674-F6">Add P67-U349879-A1532674-F6 to cart (Print, Photo, Framed)</a><br>';
        echo '<a href="/cart/index/add?sku=P67-U349879-A1532674-F7">Add P67-U349879-A1532674-F7 to cart (Print, Photo, Framed)</a><br>';
        echo '<a href="/cart/index/add?sku=P67-U349879-A1532674-F8">Add P67-U349879-A1532674-F8 to cart (Print, Photo, Framed)</a><br>';
        die;
    }

    public function actionCartsteptest()
    {
        return;
        $transfer = new Sao_Shared_Cart_Transfer_StepStorage();
        $cartStepModel = Generated_Yves_ModelFactory::getYpCartModelCartStepStorage();
        $cartStepModel->storeUserCartStep(99, 'trallalas');
    }


}
