<?php

/**
 *
 */
class Sao_Yves_Customer_Component_Form_ShareWishlist extends Sao_Yves_Library_Form_Model
{
    /**
     *
     */
    public function init()
    {
        $emailsByComma = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textArea, 'emailsByComma', $this);
        $emailsByComma->setAttribute('class', 'textInput');
        $emailsByComma->setLabel('<strong>' . t(Sao_Yves_Library_L::DISTRIBUTE_EMAIL_ADDRESSES) . '</strong>');
        $emailsByComma->addValidatorEmailsByComma();
        $emailsByComma->setRequired();

        $message = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textArea, 'message', $this);
        $message->setAttribute('class', 'textInput');
        $message->setLabel('<strong>' . t(Sao_Yves_Library_L::MESSAGE) . '</strong>');

        $rss = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_hiddenField, 'rssConfirmation', $this);
        $rss->setAttribute('class', 'checkboxInput');
        $rss->setLabel('<strong>' . t(Sao_Yves_Library_L::DISTRIBUTE_RSS_CONFIRMATION) . '</strong>');

        $this->addElements(array($emailsByComma, $message, $rss));
    }

    /**
     * @param $name
     * @param $messages
     */
    public function emailsByComma($name, $messages)
    {
        $validator = new CEmailValidator();

        $emailsByComma = $this->getElement('emailsByComma')->getValue();
        $emailsArr = explode(',', $emailsByComma);
        foreach ($emailsArr as $email) {
            if (!$validator->validateValue($email)) {
                $this->addError($name, $messages['message']);
                break;
            }
        }
    }
}