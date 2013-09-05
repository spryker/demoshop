<?php 

namespace Generated\Shared\Library;

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class TransferLoader extends \ProjectA_Shared_Library_Architecture_Store
{

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Acl_Transfer_User
     */
    public static function getAclUser($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Acl_Transfer_User');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA\Shared\Cart\Transfer\CartChange
     */
    public static function getCartChange($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA\Shared\Cart\Transfer\CartChange');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA\Shared\Cart\Transfer\CartItem
     */
    public static function getCartItem($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA\Shared\Cart\Transfer\CartItem');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA\Shared\Cart\Transfer\CartItemCollection
     */
    public static function getCartItemCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA\Shared\Cart\Transfer\CartItemCollection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Cart_Transfer_StepStorage
     */
    public static function getCartStepStorage($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Cart_Transfer_StepStorage');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Customer_Transfer_Customer
     */
    public static function getCustomer($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Customer_Transfer_Customer');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Newsletter_Transfer_Subscription
     */
    public static function getNewsletterSubscription($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Newsletter_Transfer_Subscription');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Glossary_Transfer_Key
     */
    public static function getGlossaryKey($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Glossary_Transfer_Key');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Library_Transfer_EnrichmentRules
     */
    public static function getLibraryEnrichmentRules($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Library_Transfer_EnrichmentRules');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Library_Transfer_Request
     */
    public static function getLibraryRequest($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Library_Transfer_Request');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Library_Transfer_Response_Message_Collection
     */
    public static function getLibraryResponseMessageCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Library_Transfer_Response_Message_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Library_Transfer_Response_Message
     */
    public static function getLibraryResponseMessage($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Library_Transfer_Response_Message');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Library_Transfer_Response
     */
    public static function getLibraryResponse($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Library_Transfer_Response');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \ProjectA_Shared_Payment_Transfer_Mundipagg_Boleto
     */
    public static function getPaymentMundipaggBoleto($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('ProjectA_Shared_Payment_Transfer_Mundipagg_Boleto');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Payment_Transfer_Mundipagg_TransactionStatus
     */
    public static function getPaymentMundipaggTransactionStatus($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Payment_Transfer_Mundipagg_TransactionStatus');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Payment_Transfer_Payone_TransactionStatus
     */
    public static function getPaymentPayoneTransactionStatus($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Payment_Transfer_Payone_TransactionStatus');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Collection
     */
    public static function getSalesOrderCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Item_Collection
     */
    public static function getSalesOrderItemCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Item_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Item_Option_Collection
     */
    public static function getSalesOrderItemOptionCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Item_Option_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Item_Option
     */
    public static function getSalesOrderItemOption($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Item_Option');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Item
     */
    public static function getSalesOrderItem($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Item');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order
     */
    public static function getSalesOrder($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @return \Sao_Shared_Adyen_Transfer_StatusNotification
     */
    public static function getAdyenStatusNotification()
    {
        $className = self::transformClassName('Sao_Shared_Adyen_Transfer_StatusNotification');
        $transfer = new $className();
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Artist_Transfer_Address
     */
    public static function getArtistAddress($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Artist_Transfer_Address');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public static function getArtistArtworkAvailability($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Artist_Transfer_ArtworkAvailability');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Catalog_Transfer_Product
     */
    public static function getCatalogProduct($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Catalog_Transfer_Product');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Customer_Transfer_Address_Collection
     */
    public static function getCustomerAddressCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Customer_Transfer_Address_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Customer_Transfer_Address
     */
    public static function getCustomerAddress($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Customer_Transfer_Address');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Customer_Transfer_Legacy
     */
    public static function getCustomerLegacy($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Customer_Transfer_Legacy');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Fulfillment_Transfer_Pickup
     */
    public static function getFulfillmentPickup($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Fulfillment_Transfer_Pickup');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Fulfillment_Transfer_Quote_Collection
     */
    public static function getFulfillmentQuoteCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Fulfillment_Transfer_Quote_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Fulfillment_Transfer_Quote
     */
    public static function getFulfillmentQuote($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Fulfillment_Transfer_Quote');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Legacy_Transfer_Block_Artist
     */
    public static function getLegacyBlockArtist($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Legacy_Transfer_Block_Artist');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Legacy_Transfer_Block_Artwork
     */
    public static function getLegacyBlockArtwork($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Legacy_Transfer_Block_Artwork');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_AccountingAwaitingRefund
     */
    public static function getMailAccountingAwaitingRefund($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_AccountingAwaitingRefund');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Address
     */
    public static function getMailAddress($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Address');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ArtistSalesNotification
     */
    public static function getMailArtistSalesNotification($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ArtistSalesNotification');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ArtistSalesNotificationManufactured
     */
    public static function getMailArtistSalesNotificationManufactured($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ArtistSalesNotificationManufactured');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Attachment_Collection
     */
    public static function getMailAttachmentCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Attachment_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Attachment
     */
    public static function getMailAttachment($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Attachment');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_BlockArtist
     */
    public static function getMailBlockArtist($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_BlockArtist');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_AbstractSequence
     */
    public static function getMailCartAbandonedAbstractSequence($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_AbstractSequence');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_AbstractStep
     */
    public static function getMailCartAbandonedAbstractStep($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_AbstractStep');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_Item_Collection
     */
    public static function getMailCartAbandonedItemCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_Item_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_Item
     */
    public static function getMailCartAbandonedItem($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_Item');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence1
     */
    public static function getMailCartAbandonedStepCartSequence1($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence1');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence2
     */
    public static function getMailCartAbandonedStepCartSequence2($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence2');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence3
     */
    public static function getMailCartAbandonedStepCartSequence3($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence3');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence1
     */
    public static function getMailCartAbandonedStepPaymentSequence1($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence1');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence2
     */
    public static function getMailCartAbandonedStepPaymentSequence2($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence2');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence3
     */
    public static function getMailCartAbandonedStepPaymentSequence3($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence3');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence1
     */
    public static function getMailCartAbandonedStepReviewSequence1($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence1');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence2
     */
    public static function getMailCartAbandonedStepReviewSequence2($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence2');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence3
     */
    public static function getMailCartAbandonedStepReviewSequence3($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence3');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe
     */
    public static function getMailCartAbandonedUnsubscribe($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ClarifyArtworkAvailability
     */
    public static function getMailClarifyArtworkAvailability($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ClarifyArtworkAvailability');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ClarifyHandpicked
     */
    public static function getMailClarifyHandpicked($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ClarifyHandpicked');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Collection
     */
    public static function getMailCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ConfirmArtworkAvailability
     */
    public static function getMailConfirmArtworkAvailability($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ConfirmArtworkAvailability');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_CustomerCareMessage
     */
    public static function getMailCustomerCareMessage($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_CustomerCareMessage');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_CustomerForgotPassword
     */
    public static function getMailCustomerForgotPassword($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_CustomerForgotPassword');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_CustomerForgotPasswordConfirmation
     */
    public static function getMailCustomerForgotPasswordConfirmation($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_CustomerForgotPasswordConfirmation');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_CustomerRegistration
     */
    public static function getMailCustomerRegistration($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_CustomerRegistration');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_FirstArtistArtworkAvailabilityReminder
     */
    public static function getMailFirstArtistArtworkAvailabilityReminder($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_FirstArtistArtworkAvailabilityReminder');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Invoice
     */
    public static function getMailInvoice($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Invoice');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Item_Collection
     */
    public static function getMailItemCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Item_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Item
     */
    public static function getMailItem($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Item');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ItemNotDelivered
     */
    public static function getMailItemNotDelivered($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ItemNotDelivered');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Mail
     */
    public static function getMail($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_Mail');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ManualProcess
     */
    public static function getMailManualProcess($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ManualProcess');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_NewsletterSubscriptionCoupon
     */
    public static function getMailNewsletterSubscriptionCoupon($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_NewsletterSubscriptionCoupon');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_OrderCancellation
     */
    public static function getMailOrderCancellation($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_OrderCancellation');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public static function getMailOrderConfirmation($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_OrderConfirmation');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_PayoutRequestPossible
     */
    public static function getMailPayoutRequestPossible($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_PayoutRequestPossible');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_PreShippingInfoOriginal
     */
    public static function getMailPreShippingInfoOriginal($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_PreShippingInfoOriginal');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_PrintFileCheckFailure
     */
    public static function getMailPrintFileCheckFailure($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_PrintFileCheckFailure');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ReceiptOfOrder
     */
    public static function getMailReceiptOfOrder($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ReceiptOfOrder');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_SecondArtistArtworkAvailabilityReminder
     */
    public static function getMailSecondArtistArtworkAvailabilityReminder($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_SecondArtistArtworkAvailabilityReminder');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ShippingConfirmation
     */
    public static function getMailShippingConfirmation($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ShippingConfirmation');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ShippingInfoOriginal
     */
    public static function getMailShippingInfoOriginal($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ShippingInfoOriginal');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_ShippingInfoPrint
     */
    public static function getMailShippingInfoPrint($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Mail_Transfer_ShippingInfoPrint');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Newsletter_Transfer_Subscription_Collection
     */
    public static function getNewsletterSubscriptionCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Newsletter_Transfer_Subscription_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Payment_Transfer_Methods_Response
     */
    public static function getPaymentMethodsResponse($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Payment_Transfer_Methods_Response');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Salesrule_Transfer_Collection
     */
    public static function getSalesruleCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Salesrule_Transfer_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Salesrule_Transfer_Item
     */
    public static function getSalesruleItem($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Salesrule_Transfer_Item');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Salesrule_Transfer_Salesrule
     */
    public static function getSalesrule($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Salesrule_Transfer_Salesrule');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Discount_Collection
     */
    public static function getSalesDiscountCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Discount_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Discount
     */
    public static function getSalesDiscount($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Discount');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Expense_Collection
     */
    public static function getSalesExpenseCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Expense_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Expense
     */
    public static function getSalesExpense($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Expense');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Address_Collection
     */
    public static function getSalesOrderAddressCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Address_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Address
     */
    public static function getSalesOrderAddress($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Address');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Item_Legacy
     */
    public static function getSalesOrderItemLegacy($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Item_Legacy');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_ItemDiscount_Collection
     */
    public static function getSalesOrderItemDiscountCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_ItemDiscount_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_ItemDiscount
     */
    public static function getSalesOrderItemDiscount($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_ItemDiscount');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Payment_Collection
     */
    public static function getSalesOrderPaymentCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Payment_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order_Payment
     */
    public static function getSalesOrderPayment($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Order_Payment');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public static function getSalesOriginalNotification($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_OriginalNotification');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Statemachine_Trigger
     */
    public static function getSalesStatemachineTrigger($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Statemachine_Trigger');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $transferItems (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Tax_Item_Collection
     */
    public static function getSalesTaxItemCollection($transferItems = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Tax_Item_Collection');
        $transfer = new $className($transferItems, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Tax_Item
     */
    public static function getSalesTaxItem($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Tax_Item');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Tax
     */
    public static function getSalesTax($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Tax');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }

    /**
     * @param mixed $data (optional) default: null
     * @param bool $fuzzyMatch (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Totals
     */
    public static function getSalesTotals($data = null, $fuzzyMatch = false)
    {
        $className = self::transformClassName('Sao_Shared_Sales_Transfer_Totals');
        $transfer = new $className($data, $fuzzyMatch);
        return $transfer;
    }


}
