<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Yves_Checkout_Component_Form_Creditcard extends Sao_Yves_Library_Form_Model
{

    public function init()
    {
        $name = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_hiddenField, 'name', $this);
        $name->setAttribute('value', 'creditcard');
        $this->addElement($name);

        $ccImg = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_html, 'ccImage', $this);
        $ccImg->setValue('<ul class="cccIcons clearfix">
                <li class="visa" data-type="visa">Visa</li>
                <li class="mastercard" data-type="mastercard">MasterCard</li>
                <li class="amex" data-type="amex">American Express</li>
                <li class="dinersclub" data-type="dinersclub">Diners Club</li>
                <li class="elo" data-type="elo">Elo</li>
                </ul>
                <span class="ccInfo">('.t(Sao_Yves_Library_L::PAYMENT_CC_INFO_TEXT).')</span>
                <p id="unknownOrUnsupported" class="error">'.t(Sao_Yves_Library_L::PAYMENT_CC_UNKNOWN_OR_UNSUPPORTED).'</p>
                ');

        $this->addElement($ccImg);

        $type = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_dropDownList, 'cc_type', $this);
        $type->setLabel(t(Sao_Yves_Library_L::CC_TYPE));
        // The values are the ones that need to be sent to mundipagg
        $type->setData(array(
            'visa' => 'Visa',
            'mastercard' => 'MasterCard',
            //'Hipercard' => 'Hipercard',
            'amex' => 'American Express',
            'discover' => 'Discover',
        ));
        $type->setRequired();
        $this->addElement($type);


//        $holder = new Sao_Yves_Library_Form_Element(Yp_Form_Element::FIELD_textField, 'cc_cardholder', $this);
//        $holder->setAttribute('class', 'textInput');
//        $holder->setLabel(t(L::CC_HOLDER));
//        $holder->setRequired();
//        $holder->setLength(2, 50);
//        $holder->setAttribute('data-validation-length-min', 2);
//        $holder->setAttribute('data-validation-length-max', 50);
//        $this->addElement($holder);

        $number = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'cc_number', $this);
        $number->setAttribute('class', 'textInput onlyNumericAndSpaces');
        $number->setLabel(t(Sao_Yves_Library_L::CC_NUMBER));
        $number->setRequired();
        $number->setAttribute("maxlength", "16");
        $number->addValidatorDigits();
        $number->addValidatorCCNumber();
        $this->addElement($number);

        $month = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_dropDownList, 'cc_expiration_month', $this);
        $month->setData(array(
            '' => '--',
            '1' => '01',
            '2' => '02',
            '3' => '03',
            '4' => '04',
            '5' => '05',
            '6' => '06',
            '7' => '07',
            '8' => '08',
            '9' => '09',
            '10' => '10',
            '11' => '11',
            '12' => '12',
        ));
        $month->setLabel(t(Sao_Yves_Library_L::CC_VALID_MONTH));
        $month->setLength(1, 2);
        $month->setAttribute('data-validation-length-min', 1);
        $month->setRequired();
        $month->addValidatorDigits();
        $this->addElement($month);

        $years = array();
        $years[0] = '--';
        for ($i = date('Y'); $i <= (date('Y') + 10); $i++) {
            $years[$i] = $i;
        }
        $year = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_dropDownList, 'cc_expiration_year', $this);
        $year->setData($years);
        $year->setLabel(t(Sao_Yves_Library_L::CC_VALID_YEAR));
        $year->setLength(4);
        $year->setAttribute('data-validation-length-min', 4);
        $year->setRequired();
        $year->addValidatorDigits();
        $this->addElement($year);

        $ccv = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'cc_verification', $this);
        $ccv->setAttribute('class', 'smallTextInput onlyNumeric');
        $ccv->setLabel(t(Sao_Yves_Library_L::CC_CCV).' <a class="ccvHint">'.t(Sao_Yves_Library_L::WHAT_IS_CCV).'<span class="ccvHintImage"></span></a>');
        $ccv->setRequired();
        $ccv->addValidatorDigits();
        $ccv->setLength(3, 4);
        $ccv->setAttribute('data-validation-required', '1');
        $ccv->setLabelAttribute('data-tooltip', t(Sao_Yves_Library_L::TOOLTIP_PAYMENT_CREDITCARD_CCV, array('break' => '<br />')));
        $this->addElement($ccv);
    }

}
