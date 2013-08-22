<?php

/**
 * @property $terms
 * @property $subscribe
 */
class Sao_Yves_Checkout_Component_Form_Agreement extends Sao_Yves_Library_Form_Model
{
    public function init()
    {
        $m = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_checkBox, 'terms', $this);
        /*$m->setLabel(
            t(L::AGREE_TO_TERMS_TEXT, array(
                'tosLinkStart' => '<a href="#agbInfo" class="agbInfo" data-rel="prettyPhoto">',
                'tosLinkEnd' => '</a>',
                'withdrawalLinkStart' => '<a href="#withdrawalInfo" class="withdrawalInfo" data-rel="prettyPhoto">',
                'withdrawalLinkEnd' => '</a>',

            ))
        );
        $m->setAttribute('class', 'checkbox');
        $m->setRequired();
        $this->addElement($m);*/


        $m = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_checkBox, 'subscribe', $this);
        $m->setLabel(t(Sao_Yves_Library_L::SUBSCRIBE_TO_NEWSLETTER_TEXT));
        $m->setAttribute('class', 'checkbox');
        $m->setLabelAttribute('data-tooltip', t(Sao_Yves_Library_L::TOOLTIP_CHECKOUT_NEWSLETTER, array('break' => '<br />')));
        $this->addElement($m);
    }

}