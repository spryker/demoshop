<?php

class Sao_Zed_Sales_Module_Controller_Order extends ProjectA_Zed_Sales_Module_Controller_Order
{
    public function init()
    {
        parent::init();
        $this->view->headLink()->appendStylesheet('/styles/order-overview.css');
        $this->view->headScript()->appendFile('/scripts/order-overview.js');
    }

    public function setFlagAction()
    {
        $this->disableLayout();

        $array = [];
        $array['newState'] = $this->facadeSales->setFlagOnOrder($this->getParam('id'));

        echo json_encode($array);
    }

    public function indexAction()
    {
        // quick fix
        $request = Zend_Controller_Front::getInstance()->getRequest();
        if (!$request->getParam('show_test'))
            $request->setParam('show_test', 0);

        $this->view->selectedButton = $request->getParam('show_test');

        parent::indexAction();
    }


    public function editAddressAction()
    {
        $idSalesOrder = $this->_request->getParam('id');
        assert(isset($idSalesOrder) && is_numeric($idSalesOrder));

        $order = $this->facadeSales->getOrderBySalesOrderId($idSalesOrder);

        $type = $this->getRequest()->getParam('type');
        if ($type == '' || empty($order)) {
            $this->redirect('/sales/order-details/index/id/' . $idSalesOrder);
        }

        $form = new Sao_Zed_Sales_Module_Form_Address($type);

        // get current address
        if ($type == 'billing') {
            $address = $order->getBillingAddress();
        } else {
            $address = $order->getShippingAddress();
        }

        $addressArray = $address->toArray();
        if ($address->getSaoAddress() && $address->getSaoAddress()->getFkMiscRegion()) {
            $addressArray['region'] = $address->getSaoAddress()->getRegion()->getIdRegion();
        }
        // end get current address

        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost();

            if ($form->isValid($post)) {
                $cleanedPost = $this->stripParams($request->getPost());

                $address->fromArray($cleanedPost);

                $this->logChanges($cleanedPost, $addressArray, $order, $type);

                if (!empty($cleanedPost['region']) || (empty($cleanedPost['region']) && isset($addressArray['region']))) {
                    // avoids setting empty new sao addresses
                    $saoAddress = $address->getSaoAddress();
                    if (empty($saoAddress)) {
                        $saoAddress = Generated_Zed_EntityLoader::getSaoSalesOrderAddress();
                    }
                    if (empty($cleanedPost['region'])) {
                        $cleanedPost['region'] = null;
                    }

                    $saoAddress->setFkMiscRegion($cleanedPost['region']);
                    $address->setSaoAddress($saoAddress);
                }

                $address->save();

                $this->redirect('/sales/order-details/index/id/' . $idSalesOrder);
            } else {
                $form->setDefaults($request->getParams());
            }
        } else {
            $form->setDefaults($addressArray);
        }

        $this->view->form = $form;
        $this->view->type = $type;
        $this->view->order = $order;
    }

    protected function logChanges($new, $old, $order, $type)
    {
        $changesToOld = array_diff($new, $old);

        if (count($changesToOld)) {
            $string = 'changes to ' . $type . ' address: ';
            $parts = [];
            foreach ($changesToOld AS $key => $newValue) {
                if ($key === 'region') {
                    if ($new[$key] > 0)
                        $new[$key] = Sao_Zed_Misc_Persistence_SaoMiscRegionQuery::create()->findOneByIdRegion($new[$key])->getName();
                    if ($old[$key] > 0)
                        $old[$key] = Sao_Zed_Misc_Persistence_SaoMiscRegionQuery::create()->findOneByIdRegion($old[$key])->getName();
                } elseif ($key === 'fk_misc_country') {
                    $new[$key] = ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery::create()->findOneByIdMiscCountry($new[$key])->getName();
                    $old[$key] = ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery::create()->findOneByIdMiscCountry($old[$key])->getName();
                }

                $oldValue = isset($old[$key]) ? $old[$key] : 'nothing';

                $parts[] = $key . ' from ' . $oldValue . ' to ' . $new[$key];
            }

            $string .= join(', ', $parts);

            $this->facadeSales->saveNote($string, $order, true, get_class($this));
        }
    }

    protected function stripParams($params)
    {
        unset($params['module'], $params['action'], $params['controller'], $params['id'], $params['type'], $params['submit']);
        return $params;
    }
}
