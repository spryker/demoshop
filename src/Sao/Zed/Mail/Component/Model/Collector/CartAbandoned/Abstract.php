<?php
/**
 * @property Sao_Shared_Mail_Transfer_Cart_Abandoned_AbstractStep $mailTransfer
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
abstract class Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_Abstract extends Sao_Zed_Mail_Component_Model_Collector implements
     ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
     ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
     ProjectA_Zed_Salesrule_Component_Dependency_Facade_Interface,
     Sao_Zed_Mail_Component_Interface_MailConstants,
     ProjectA_Zed_Price_Component_Interface_PriceTypeConstants,
     Sao_Shared_Catalog_Interface_ProductAttributeConstant,
     Sao_Zed_ArtistPortal_Component_Interface_ProductValueConstant,
     Sao_Zed_Legacy_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Salesrule_Component_Dependency_Facade_Trait;
    use Sao_Zed_Legacy_Component_Dependency_Facade_Trait;

    const PROTOCOL                      = 'http:';
    const CONFIG_KEY_YVES               = 'yves';
    const CONFIG_KEY_YVES_HTTPS_ENABLED = 'https_enabled';
    const CONFIG_KEY_URL                = 'url';
    const CONFIG_KEY_URL_SSL            = 'url_ssl';
    const CONFIG_KEY_URL_YVES           = 'yves';
    const CONFIG_KEY_STATIC_MEDIA       = 'static_media';
    const PROTOCOL_HTTP                 = 'http://';
    const PROTOCOL_HTTPS                = 'https://';

    /**
     * override isOrderMail from ProjectA_Zed_Mail_Component_Model_Collector
     * @see Sao_Zed_Mail_Model_Collector::$isOrderMail
     * @var bool
     */
    protected static $isOrderMail = false;

    /**
     * @param BaseObject $baseObject
     * @param null $context
     * @return Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_Abstract
     */
    public function getMailTransfer(BaseObject $baseObject, $context = null)
    {
        /** @var $baseObject ProjectA_Zed_Cart_Persistence_PacCartUser */
        $placeholderData = array();
        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        if (!$this->applyCustomerData($baseObject->getSaoCartUser()->getUserId())) {
            return $this->mailTransfer;
        };
        $this->applyCartItems($baseObject);
        $this->applyReferenceId($baseObject);
        $this->applyUrls();
        $this->applyUnsubscribeStuff($baseObject);
        $this->applyVoucher($baseObject);
        return $this->mailTransfer;
    }

    /**
     * @param $userId
     * @return bool
     */
    public function applyCustomerData($userId)
    {
        $customer = $this->facadeLegacy->getUserDataFromLegacySystem($userId);
        if ($customer) {
            $this->mailTransfer->setRecipientAddress($customer[self::KEY_EMAIL]);
            $this->mailTransfer->setFirstName($customer[self::KEY_FIRSTNAME]);
            $this->mailTransfer->setLastName($customer[self::KEY_LASTNAME]);
            return true;
        } else {
            $this->mailTransfer->setFlagFetchLegacyUserError(true);
            return false;
        }
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    public function applyReferenceId(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $this->mailTransfer->setId($cartUser->getIdCartUser());
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    public function applyCartItems(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $cartItemCollection = $cartUser->getCart()->getCartItems();
        $items = [];
        $hasOriginal = false;

        /* @var ProjectA_Zed_Cart_Persistence_PacCartItem $cartItem */
        foreach ($cartItemCollection as $cartItem) {
            $productEntity = $this->catalogFacade->getProductBySku($cartItem->getSku());

            //we migrated old carts from legacy, maybe they contain sku`s not present in zed, let`s skip them
            if (!$productEntity) {
                continue;
            }

            $product = $this->catalogFacade->getProduct($productEntity, array(), false);
            $this->catalogFacade->addPriceToProduct(
                $product,
                $this->facadePrice->getPricingModel(self::FINAL_GROSS_PRICE)
            );

            $price = (int) $product[self::FINAL_GROSS_PRICE];

            $optionsAsLiString = '';
            $optionCollection = $cartItem->getOptions();
            /* @var ProjectA_Zed_Cart_Persistence_PacCartItemOption $option */
            foreach ($optionCollection as $option) {
                $optionEntity = $this->catalogFacade->getProductOptionByIdentifier($option->getIdentifier());
                $price += $optionEntity->getPrice();
                $prefix = 'including';
                if ($optionEntity->getOptionType()->getName() ===
                    ProjectA_Shared_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_WRAP) {
                    $prefix = 'on';
                }
                $optionsAsLiString .= $prefix . ' ' . $optionEntity->getName();
            }

            $subText = sprintf(
                '%s%s %s',
                $product[self::ATTRIBUTE_PRODUCT_CATEGORY] == 'limited edition' ? 'Limited Edition ' : '',
                $product[self::ATTRIBUTE_PRODUCT_NAME],
                $optionsAsLiString
            );

            $artistName = sprintf(
                '%s %s',
                $product[self::ATTRIBUTE_ARTIST_FIRST_NAME],
                $product[self::ATTRIBUTE_ARTIST_LAST_NAME]
            );

            $items[] = [
                'image' => self::PROTOCOL . $product[self::ATTRIBUTE_ART_TINY_CROP],
                'name' => $product[self::ATTRIBUTE_NAME],
                'artistName' => $artistName,
                'subText' => $subText,
                'price' => $price,
                'formattedPrice' => ProjectA_Shared_Library_Currency::format((int) $product[self::FINAL_GROSS_PRICE], true)
            ];

            if ($product[self::ATTRIBUTE_PRODUCT_SET] == self::SET_MARKETPLACE) {
                $hasOriginal = true;
            }
        }

        $itemCollection = Generated_Shared_Library_TransferLoader::getMailCartAbandonedItemCollection();
        $itemCollection->fromArray($items);

        $this->mailTransfer->setCartItems($itemCollection);
        $this->mailTransfer->setHasOriginal($hasOriginal);
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     * @throws ProjectA_Zed_Library_Exception
     */
    public function applyVoucher(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $stepName = static::STEP_NAME;
        $position = static::$position;

        $mailSequenceStep  = (new Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery())->findOneByStep($stepName);
        if (!$mailSequenceStep) {
            throw new ProjectA_Zed_Library_Exception('step "' . $stepName . '" not connected to a mail sequence');
        }

        $codepoolElementQuery  = new Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery();
        /* @var Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool $codepoolElement */
        $codepoolElement = $codepoolElementQuery
            ->useMailSequenceElementQuery()
                ->filterByPosition($position)
                ->useMailSequenceQuery()
                    ->useMailSequenceStepQuery()->filterByStep($stepName)->endUse()
                ->endUse()
            ->endUse()
            ->findOne();

        if (!$codepoolElement) {
            //'element at position "' . $position . '" of step "' . $stepName . '" not connected to a codepool';
            return;
        }

        $codepoolId = $codepoolElement->getFkSalesruleCodepool();
        $codeValidToInterval = $codepoolElement->getCodeValidToInterval();
        $codeValidToFormat = $codepoolElement->getCodeValidToFormat();

        if (!$codeValidToInterval && !$codeValidToFormat) {
            throw new ProjectA_Zed_Library_Exception('element at position "' . $position . '" of step "' . $stepName . '" connected to a codepool but no interval and format set');
        }

        $mailSequence = $mailSequenceStep->getMailSequence();
        $mailSequenceCode = (new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery())
            ->filterByFkCartUser($cartUser->getIdCartUser())
            ->filterByFkMailSequence($mailSequence->getIdMailSequence())
            ->filterByFkSalesruleCodepool($codepoolId)
            ->findOne();

        if (!$mailSequenceCode) {
            $prefix = $this->getCodepoolPrefixById($codepoolId);
            /* @var ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode $code */
            $codeEntity = $this->getFacadeCodepool()->createCode($codepoolId, null, 6, $prefix);

            $mailSequenceCode = Generated_Zed_EntityLoader::getSaoMailSequenceCartUserCode();
            $mailSequenceCode->setFkCartUser($cartUser->getIdCartUser());
            $mailSequenceCode->setFkMailSequence($mailSequence->getIdMailSequence());
            $mailSequenceCode->setFkSalesruleCode($codeEntity->getIdSalesruleCode());
            $mailSequenceCode->setFkSalesruleCodepool($codeEntity->getFkSalesruleCodepool());
            $mailSequenceCode->save();
        }

        $this->mailTransfer->setCode($mailSequenceCode->getSalesruleCode()->getCode());

        $dateTime = new DateTime();
        $dateInterval = DateInterval::createFromDateString($codeValidToInterval);
        $dateTime->add($dateInterval);
        $this->mailTransfer->setCodeValidTo($dateTime->format($codeValidToFormat));
    }

    /**
     * @param $id
     * @return string
     */
    public function getCodepoolPrefixById($id)
    {
        return $this->getFacadeCodepool()->getSalesruleCodePrefixByCodepoolId($id);
    }

    /**
     * @return ProjectA_Zed_Salesrule_Component_Facade_Codepool
     */
    protected function getFacadeCodepool()
    {
        return $this->facadeSalesrule->getFacadeCodepool();
    }

    protected function applyUrls()
    {
        $this->applyYvesUrl();
        $this->applyStaticMediaUrl();
    }

    protected function applyYvesUrl()
    {
        $yvesConfig = ProjectA_Shared_Library_Config::get(self::CONFIG_KEY_YVES);
        if ($yvesConfig) {
            if ($yvesConfig[self::CONFIG_KEY_YVES_HTTPS_ENABLED]) {
                $protocol = self::PROTOCOL_HTTPS;
                $urlConfig = ProjectA_Shared_Library_Config::get(self::CONFIG_KEY_URL_SSL);
            } else {
                $protocol = self::PROTOCOL_HTTP;
                $urlConfig = ProjectA_Shared_Library_Config::get(self::CONFIG_KEY_URL);
            }
            $yvesUrl = rtrim($protocol . $urlConfig[self::CONFIG_KEY_URL_YVES], DIRECTORY_SEPARATOR);
            $this->mailTransfer->setYvesUrl($yvesUrl);
        }
    }

    protected function applyStaticMediaUrl()
    {
        $yvesConfig = ProjectA_Shared_Library_Config::get(self::CONFIG_KEY_YVES);
        if ($yvesConfig) {
            if ($yvesConfig[self::CONFIG_KEY_YVES_HTTPS_ENABLED]) {
                $protocol = self::PROTOCOL_HTTPS;
                $urlConfig = ProjectA_Shared_Library_Config::get(self::CONFIG_KEY_URL_SSL);
            } else {
                $protocol = self::PROTOCOL_HTTP;
                $urlConfig = ProjectA_Shared_Library_Config::get(self::CONFIG_KEY_URL);
            }
            $staticMediaUrl = rtrim($protocol . $urlConfig[self::CONFIG_KEY_STATIC_MEDIA], DIRECTORY_SEPARATOR);
            $this->mailTransfer->setStaticMediaUrl($staticMediaUrl);
        }
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    public function applyUnsubscribeStuff(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $unsubscribeHash = $this->factory->getModelCartAbandoned()->getHash($cartUser);
        $this->mailTransfer->setCartUserId($cartUser->getIdCartUser());
        $this->mailTransfer->setUnsubscribeHash($unsubscribeHash);
    }
}
