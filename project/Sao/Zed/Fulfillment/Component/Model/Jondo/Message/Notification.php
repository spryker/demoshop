<?php
/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */

class Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Notification
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Abstract
{
    /**
     * @var array
     */
    protected $requiredFields = array(
        'poNumber',
        'synergizeId',
        'tracking',
        'userId',
        'userKey'
    );

    /**
     * parse notification posted from harvest
     * @param array $data
     * @return array
     * @throws ErrorException
     */
    public function parseNotification(array $data)
    {
        $requiredFieldList = implode(', ', $this->requiredFields);
        foreach ($this->requiredFields as $fieldName) {
            if (false === isset($data[$fieldName])) {
                $message = 'Missing required field: ' . $fieldName . ';';
                $message .= 'required: ' . $requiredFieldList;
                throw new ErrorException($message);
            }
        }
        if ($this->userId != $data['userId'] || $this->apiKey != $data['userKey']) {
            throw new ErrorException('userId & userKey is incorrect!');
        }
        return array(
            'items' => $this->decodePurchaseOrderNumber($data['poNumber']),
            'refId' => $data['synergizeId'],
            'tracking' => explode('|', $data['tracking'])
        );
    }

    /**
     * @param string $purchaseOrderNumber
     * @return array
     */
    protected function decodePurchaseOrderNumber($purchaseOrderNumber)
    {
        $parts = explode('-', $purchaseOrderNumber);
        $orderId = array_shift($parts);
        $result = array();
        foreach ($parts as $part) {
            $result[] = array(
                'order_id' => $orderId, 'id' => $part
            );
        }
        return $result;
    }
}