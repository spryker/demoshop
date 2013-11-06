<?php

use Generated\Shared\Library\TransferLoader;

class Pyz_Zed_Sales_Component_Model_Orderprocess_Command_PayonePaypalAuthorise extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    \ProjectA_Zed_Sales_Component_Interface_OrderCommand,
    \Generated\Zed\Payment\Component\Dependency\PaymentFacadeInterface,
    \ProjectA_Zed_Payment_Component_Interface_Constants
{
    use \Generated\Zed\Payment\Component\Dependency\PaymentFacadeTrait;

    protected $date = null;

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param \ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     * @return \ProjectA_Zed_Payment_Component_Model_Response
     */
    public function __invoke(
        \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity,
        \ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
    ) {
        $this->date = new DateTime();

        $paymentTransfer = TransferLoader::loadSalesPayment();
        $context['Transfer_Sales_Order_Payment'] = $paymentTransfer;

        $payoneRequestData = $this->fillPayoneData($orderEntity, $context);

        $parsedUrl = $this->getPreparedUrl($payoneRequestData);
        $rawResult = $this->triggerPayoneCall($parsedUrl);

        $result = $this->formatResult($rawResult);

        $response = $this->handleResult($result, $orderEntity, $context);

        // todo:  we can't log the transaction because we don't have a payment
        // (or at least no transactionid if there was an error)
        // maybe throw an exception or log something?
        if ($response->isSuccess()) {
            $this->storeAndLog($payoneRequestData, $result, $response, $orderEntity);
        }

        return $response;
    }

    /**
     * @param array $result
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     * @return ProjectA_Zed_Payment_Component_Model_Response
     */
    protected function handleResult(
        array $result,
        \ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
    ) {
        $success = $result['status'] !== 'ERROR';

        $response = $this->setupResponse($success);
        $context[self::PAYMENT_TRANSACTION_RESPONSE_KEY] = $response;

        if ($response->isSuccess()) {
            if ($result['status'] === 'REDIRECT') {
                $response->setIsRedirect(true);
                $response->setRedirectUrl($result['redirecturl']);
            }
            $response->setTransaction($result['txid']);
        } else {
            $response->setErrorMessageInternal($result['errormessage']);
            $response->setErrorMessageUser($result['customermessage']);
        }

        return $response;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @return array
     */
    protected function fillPayoneData(\ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        $payoneConfig = ProjectA_Shared_Library_Config::get('payone');

        $payonedata = [
            // base data
            'aid'          => $payoneConfig->get('aid'),
            'mid'          => $payoneConfig->get('mid'),
            'key'          => $payoneConfig->get('key'),
            'request'      => 'authorization',
            'mode'         => $payoneConfig->get('mode'),
            'portalid'     => $payoneConfig->get('portalid'),
            'encoding'     => $payoneConfig->get('encoding'),
            'currency'     => \ProjectA_Shared_Library_Store::getInstance()->getCurrencyIsoCode(),
            // paymenttype
            'clearingtype' => 'wlt',
            'wallettype'   => 'PPE',
            'successurl'   => '', //todo
            'errorurl'     => '', //todo
            'backurl'      => '', //todo
            // order
            'reference'    => $orderEntity->getIncrementId(),
            'amount'       => $orderEntity->getGrandTotal(),
        ];

        $this->fillPersonalData($payonedata, $orderEntity);
        $this->fillShippingData($payonedata, $orderEntity);

        return $payonedata;
    }

    /**
     * @param array $payoneData
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     */
    protected function fillPersonalData(array &$payoneData, \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        $billingAddress = $orderEntity->getBillingAddress();

        $payoneData['firstname'] = $orderEntity->getFirstName();
        $payoneData['lastname'] = $orderEntity->getLastName();
        $payoneData['salutation'] = ($orderEntity->getSalutation() == 'Mr') ? 'Herr' : 'Frau';
        $payoneData['street'] = $billingAddress->getAddress1() .
            ' ' . $billingAddress->getAddress2();

        $addressAddition = $billingAddress->getAddress3();
        $payoneData['addressaddition'] = $addressAddition ? $addressAddition : null;
        $payoneData['city'] = $billingAddress->getCity();
        $payoneData['zip'] = $billingAddress->getZipCode();
        $payoneData['country'] = $billingAddress->getCountry()->getIso2Code();
        $payoneData['email'] = $billingAddress->getEmail();
        $payoneData['language'] = ProjectA_Shared_Library_Store::getInstance()->getCurrentLanguage();
    }

    /**
     * @param array $payoneData
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     */
    protected function fillShippingData(array &$payoneData, \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        $shippingAddress = $orderEntity->getShippingAddress();

        $payoneData['shipping_firstname'] = $shippingAddress->getFirstName();
        $payoneData['shipping_lastname'] = $shippingAddress->getLastName();
        $payoneData['shipping_street'] = $shippingAddress->getAddress1() . ' ' .
            $shippingAddress->getAddress2();

        $payoneData['shipping_city'] = $shippingAddress->getCity();
        $payoneData['shipping_zip'] = $shippingAddress->getZipCode();
        $payoneData['shipping_country'] = $shippingAddress->getCountry()->getIso2Code();
        $payoneData['shipping_email'] = $shippingAddress->getEmail();
    }

    /**
     * @param array $payoneData
     * @return mixed
     */
    protected function getPreparedUrl(array $payoneData)
    {
        $url = 'https://api.pay1.de/post-gateway/';

        $queryString = http_build_query($payoneData);
        $completeUrl = $url . '?' . $queryString;

        return parse_url($completeUrl);
    }

    /**
     * @param array $parsedUrl
     * @return mixed
     * @throws ProjectA_Shared_Library_Exception
     */
    protected function triggerPayoneCall(array $parsedUrl)
    {
        $curlTarget = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'];

        $oCurl = curl_init($curlTarget);
        curl_setopt($oCurl, CURLOPT_POST, 1);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS, $parsedUrl['query']);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($oCurl, CURLOPT_TIMEOUT, 45);

        $result = curl_exec($oCurl);
        if (curl_error($oCurl)) {
            throw new ProjectA_Shared_Library_Exception(
                'TODO ' . 'errormessage=' . curl_errno($oCurl) . ': ' . curl_error($oCurl)
            );
        }
        curl_close($oCurl);

        return $result;
    }

    /**
     * @param $rawResult
     * @return array
     */
    protected function formatResult($rawResult)
    {
        assert(is_string($rawResult));

        $response = explode("\n", $rawResult);
        $formatedResonse = array();
        if (is_array($response)) {
            foreach ($response as $iLinenum => $sLine) {
                $iPos = strpos($sLine, '=');
                if ($iPos > 0) {
                    $formatedResonse[substr($sLine, 0, $iPos)] = trim(substr($sLine, $iPos + 1));
                } elseif (strlen($sLine) > 0) {
                    $formatedResonse[$iLinenum] = $sLine;
                }
            }
        }
        return $formatedResonse;
    }

    /**
     * @param $isSuccess
     * @return ProjectA_Zed_Payment_Component_Model_Response
     */
    protected function setupResponse($isSuccess)
    {
        $response = new \ProjectA_Zed_Payment_Component_Model_Response($isSuccess);
        $response->setMethod('paypal');
        $response->setProvider('payone');
        return $response;
    }

    /**
     * @param array $rawRequest
     * @param array $rawResult
     * @param ProjectA_Zed_Payment_Component_Model_Response $response
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     */
    protected function storeAndLog(
        array $rawRequest,
        array $rawResult,
        \ProjectA_Zed_Payment_Component_Model_Response $response,
        \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
    ) {
        $paymentStorage = $this->facadePayment->getPaymentStorageContainer();
        $paymentStorage->setMethod($response->getMethod());
        $paymentStorage->setProvider($response->getProvider());
        $paymentStorage->setTransaction($response->getTransaction());
        $paymentStorage->setOrder($orderEntity);
        $payment = $this->facadePayment->storePayment($paymentStorage);

        $this->storeTransaction($rawRequest, $rawResult, $payment, $response);

        $this->addNote(
            $response->getProvider() . ' ' . $response->getMethod() . ' authorisation performed',
            $orderEntity,
            $response->isSuccess()
        );
    }


    /**
     * @param array $rawRequest
     * @param array $rawResult
     * @param ProjectA_Zed_Payment_Persistence_PacPayment $payment
     * @param ProjectA_Zed_Payment_Component_Model_Response $response
     */
    protected function storeTransaction(
        array $rawRequest,
        array $rawResult,
        \ProjectA_Zed_Payment_Persistence_PacPayment $payment,
        \ProjectA_Zed_Payment_Component_Model_Response $response
    ) {
        $transactionStorage = $this->facadePayment->getPaymentTransactionStorageContainer();
        $transactionStorage->setEvent('authorise');
        $transactionStorage->setIsOutbound(true);
        $transactionStorage->setMessage(
            $response->getProvider() . ' ' . $response->getMethod() . ' ' . $response->getTransaction()
        );
        $transactionStorage->setIsSuccess($response->isSuccess());
        $transactionStorage->setEventDate($this->date->format('Y-m-d h:i:s'));
        $transactionStorage->setPayment($payment);
        $transactionStorage->setRawRequest($rawRequest);
        $transactionStorage->setRawResponse($rawResult);
        $transactionStorage->setReferenceId($payment->getTransaction());
        $this->facadePayment->addPaymentTransaction($transactionStorage);
    }
}
