import $ from 'jquery';
import { prefixCss, scrollTo } from '../../common/helpers';
import { MessageService } from '../../common/messages';
import { EVENTS as STEPPER_EVENTS } from '../../forms/stepper';
import { EVENTS as CARTLAYER_EVENTS } from './cartLayer';


'use strict';


// TODO: heavily under construction
// TODO: validation, error messages, coupon, change of quantity, address selection,


const EVENTS = {
    UPDATE_CART: 'UPDATE_CART'
};

const ADYEN_KEY = '10001|A335386FB3B6B5BB4AA6CDC8AD5764BB6F20FE1087C8BC5FF8CCA1D6974E3D48D5967FCFD829BF74A1B0E12FCFF07D60DB02AE5225C49F7F4B054A4D7FADE8BCA6B7D23FA2E763746609706552E4D53D57F14A4DC937C92214B660FB9C3332C96EAB068E8436A6428A9AED8DBB4D1A5B3B15BA97927963CD6229210439293EBCC8E00C022EE2746C8F7E1F9C44271C8DC376AF4BC2448507A2DBF60401BFCCAA9AEEE65A43671C74BFBA89ED136DD8E8414F17C1EF5CBD3158E9BDA27095A6656E9C4C4FAF61F1B7FF7FED8C5BC971D460E106AF5007F606898175BC30BBD9C7AFD1E54A86584CFB9B38AF3A63B39AE61485DAB8B60ADB94A399005192450B75';


$(document).ready(function () {

    $('.checkout').each(function () {

        var $guestButton,
            $checkout,
            $navigations,
            $contentContainer,
            $contents,

            index,
            messageService;


        initAdyenPaymentForm();


        $guestButton = $('.js-button-guestcheckout');
        $checkout = $(this);
        $navigations = $checkout.find('.checkout__navigation');
        $contentContainer = $checkout.find('.checkout__contents')
        $contents = $contentContainer.find('.checkout__content')

        $contentContainer.css({'width': 100 * $contents.size() + '%'});
        $contents.css({'width': 100 / $contents.size() + '%'});

        messageService = new MessageService();

        index = 0;
        updateStep();



        $contents.find('.checkout__step-button').click(function () {
            if (validate()) {
                index++;
                updateStep();
            }
        });

        $navigations.click(function () {
            if (validate()) {
                index = $navigations.index($(this));
                updateStep();
            }
        });

        $guestButton.click(function () {
            $checkout.show();
            scrollTo($('.checkout__headline'));
        });



        function updateStep () {
            var $navigation;

            $navigation = $navigations.eq(index);

            if (!$navigation.hasClass('checkout__navigation--active')) {
                scrollTo($('.checkout__headline'), 1, function () {
                    $navigations.removeClass('checkout__navigation--active');
                    $navigation.addClass('checkout__navigation--active');

                    $contentContainer.css(prefixCss({'transform': 'translate(' + (index * -100 / $contents.size()) + '%, 0)'}));
                });
            }
        }


        function validate () {
            //messageService.show({ type: 'invalid', message: 'Not valid' });
            return true;
        }


        function initAdyenPaymentForm () {
            var $adyenPaymentForm = $('#adyen-encrypted-form')[0];

            if ($('#adyen-encrypted-form').size()) {
                var form, key, options;

                form = $adyenPaymentForm[0];
                options = {};

                adyen.encrypt.createEncryptedForm(form, ADYEN_KEY, options);
            }
        }



        $(document).on('click', '.js-voucher-form-trigger', function () {
            $(this).hide();

            $('.js-voucher-form').show();
        });

        $(document).on('click', '.js-cart-use-coupon-button-code', addCoupon);
        function addCoupon () {
            var $button = $(this);
            $button.prop('disabled', true);

            $.ajax({
                url : $('#checkoutAddCouponUrl').val(),
                method: 'POST',
                data: { 'couponCode' : $('#cart__coupon-code').val() },
                dataType: 'html'

            })
            .done(renderCart)
            .fail(function(data) {
                console.log('[ERROR] ');
                console.log(data);
            }).always(function () {
                $button.prop('disabled', false);
            });
        };

        $('.js-cart__remove-coupon-link').click(removeCoupon);
        function removeCoupon (event) {
            event.preventDefault();

            $.ajax({
                url : $checkoutRemoveCouponUrlInput.val(),
                method: 'POST',
                data: { 'couponCode' : $(this).data('couponCode') },
                dataType: 'html'

            })
            .done(renderCart)
            .fail(function(data) {
                console.log('[ERROR] ', data);
            });
        };



        var $shippingCountry = $('#checkout_billing_address_country');
        $shippingCountry.change(getShipmentPrice);

        function getShipmentPrice () {

            $.ajax({
                url : $('#addShipmentFee').val(),
                method: 'POST',
                data: { 'fkCountry' : $shippingCountry.val() },
                dataType: 'html'

            })
            .done(renderCart)
            .fail(function(data) {
                console.log('[ERROR] ', data);
            });
        };



        function renderCart (data) {
            $('.checkout .cart__items').html(data);
            $(document).trigger(STEPPER_EVENTS.INITIALIZE_STEPPERS);

            $(document).trigger(CARTLAYER_EVENTS.UPDATE_CART);
        }

    });

});



export { EVENTS };
