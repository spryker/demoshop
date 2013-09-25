<?php
namespace Pyz\Yves\Checkout\Module\Controller;

use Generated\Shared\Library\TransferLoader;
use ProjectA\Yves\Library\Controller\Controller;
use ProjectA\Yves\Sales\Module\Form\OrderType;

class CheckoutController extends Controller
{

    public function indexAction()
    {
        $type = new OrderType();
        $data = TransferLoader::getSalesOrder();
        $form = $this->app['form.factory']->create($type, $data);


        return [
            'form' => $form->createView()
        ];
    }
}
