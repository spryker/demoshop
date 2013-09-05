<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Settings extends ProjectA_Zed_Mail_Component_Settings implements Sao_Zed_Mail_Component_Model_Constants
{
    const KEY_SALT = 'cartAbandonedUnsubscribeSalt';

    /**
     * @return array
     */
    public function getMailAdapterConfig()
    {
        return array(
            self::ORDER_CONFIRMATION => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::MANUAL_PROCESS => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::BLOCK_ARTIST => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::ARTIST_SALES_NOTIFICATION_MARKETPLACE => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::ARTIST_SALES_NOTIFICATION_MANUFACTURED => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::FIRST_ARTIST_ARTWORK_AVAILABILTY_REMINDER => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::SECOND_ARTIST_ARTWORK_AVAILABILTY_REMINDER => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CONFIRM_ARTWORK_AVAILABILTY => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CLARIFY_ARTWORK_AVAILABILTY => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::SHIPPING_INFO_PRINT => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::SHIPPING_INFO_ORIGINAL => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::ITEM_NOT_DELIVERED => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::PAYOUT_REQUEST_POSSIBLE => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::PRINT_FILE_CHECK_FAILURE => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CLARIFY_HANDPICKED => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::ACCOUNTING_AWAITING_REFUND => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_CART_SEQUENCE1 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_CART_SEQUENCE2 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_CART_SEQUENCE3 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_PAYMENT_SEQUENCE1 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_PAYMENT_SEQUENCE2 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_PAYMENT_SEQUENCE3 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_REVIEW_SEQUENCE1 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_REVIEW_SEQUENCE2 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::CART_ABANDONED_STEP_REVIEW_SEQUENCE3 => self::ADAPTER_MAIL_DATABASE_QUEUE,
            self::PRE_SHIPPING_INFO_ORIGINAL  => self::ADAPTER_MAIL_DATABASE_QUEUE,
        );
    }

    /**
     * @return array
     */
    public function getProviderAdapterConfig()
    {
        return array(
            self::ORDER_CONFIRMATION => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::MANUAL_PROCESS => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::BLOCK_ARTIST => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::ARTIST_SALES_NOTIFICATION_MARKETPLACE => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::ARTIST_SALES_NOTIFICATION_MANUFACTURED => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::FIRST_ARTIST_ARTWORK_AVAILABILTY_REMINDER => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::SECOND_ARTIST_ARTWORK_AVAILABILTY_REMINDER => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CONFIRM_ARTWORK_AVAILABILTY => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CLARIFY_ARTWORK_AVAILABILTY => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::SHIPPING_INFO_PRINT => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::SHIPPING_INFO_ORIGINAL => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::ITEM_NOT_DELIVERED => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::PAYOUT_REQUEST_POSSIBLE => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::PRINT_FILE_CHECK_FAILURE => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CLARIFY_HANDPICKED => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::ACCOUNTING_AWAITING_REFUND => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_CART_SEQUENCE1 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_CART_SEQUENCE2 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_CART_SEQUENCE3 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_PAYMENT_SEQUENCE1 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_PAYMENT_SEQUENCE2 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_PAYMENT_SEQUENCE3 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_REVIEW_SEQUENCE1 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_REVIEW_SEQUENCE2 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::CART_ABANDONED_STEP_REVIEW_SEQUENCE3 => self::ADAPTER_PROVIDER_SEND_MAIL,
            self::PRE_SHIPPING_INFO_ORIGINAL  => self::ADAPTER_PROVIDER_SEND_MAIL,
        );
    }

    /**
     * set active template renderer
     * @return array
     */
    public function getTemplateRenderer()
    {
        return
            array(
                $this->factory->getModelRendererLoop(),
                $this->factory->getModelRendererCondition(),
                $this->factory->getModelRendererPartial(),
                $this->factory->getModelRendererBasic(),
            );
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        $mailConfig = ProjectA_Shared_Library_Config::get('mail');
        return $mailConfig[self::KEY_SALT];
    }
}
