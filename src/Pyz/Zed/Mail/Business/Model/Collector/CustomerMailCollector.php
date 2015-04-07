<?php


namespace Pyz\Zed\Mail\Business\Model\Collector;

use ProjectA\Zed\Mail\Business\Model\Collector\CustomerMailCollector as CoreCustomerMailCollector;

/**
 * Class CustomerMailCollector
 * @package Zoo\Zed\Mail\Component\Model\Collector
 */
class CustomerMailCollector extends CoreCustomerMailCollector
{
    /**
     * create mailTransfer and fill
     */
    public function initAfterDependencyInjection()
    {
        $this->mailTransfer = $this->createMailTransfer();
        $this->mailTransfer->setType($this->getMailType());
        $this->mailTransfer->setSubType($this->getMailSubType());
        $this->mailTransfer->setIsOrderMail($this->isOrderMail());
        $this->mailTransfer->setIsUnique($this->isUnique());
        $this->mailTransfer->setReferenceId($this->getReferenceId());
        $this->mailTransfer->setData($this->getData());
        $this->mailTransfer->setRecipientAddress($this->getRecipientAddress());
        //add yves url and static media url to all templates
        $this->mailTransfer->setYvesUrl($this->getYvesUrl());
        $this->mailTransfer->setStaticMediaUrl($this->getStaticMediaUrl());
        $this->mailTransfer->setStaticAssetsUrl($this->getStaticAssetsUrl());
        $this->mailTransfer->setAttachments($this->getAttachments());
    }
}
 