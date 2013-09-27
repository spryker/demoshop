<?php
namespace Pyz\Yves\Checkout\Module\Controller;

use Generated\Shared\Library\TransferLoader;
use ProjectA\Yves\Library\Controller\Controller;
use ProjectA\Yves\Sales\Module\Form\OrderType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class CheckoutController extends Controller
{

    public function indexAction(Request $request)
    {
        $valid = false;
        $type = new OrderType();
        $data = TransferLoader::getSalesOrder();
        /* @var FormInterface $form */
        $form = $this->app['form.factory']->create($type, $data);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $valid = true;
        }

        return [
            'form' => $form->createView(),
            'valid' => ($valid)? 'true' : 'false'
        ];
    }
}
