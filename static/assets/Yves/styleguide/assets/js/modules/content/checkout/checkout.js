import $ from 'jquery';
import { prefixCss, scrollTo } from '../../common/helpers';
import { MessageService } from '../../common/messages';

import { EVENTS as STEPPER_EVENTS } from '../../forms/stepper';
import { EVENTS as INPUT_EVENTS } from '../../forms/input';
import { EVENTS as RADIO_EVENTS } from '../../forms/radio';
import { EVENTS as CHECKBOX_EVENTS } from '../../forms/checkbox';

import { validateForm } from '../../forms/validator';


'use strict';


// TODO: heavily under construction
// TODO: validation, error messages, coupon, change of quantity, address selection,


const EVENTS = {
    UPDATE_CART: 'CHECKOUT_UPDATE_CART',
    VALIDATE: 'CHECKOUT_VALIDATE'
};

const ADYEN_KEY = $('#checkout_adyen_payment_payment_detail_adyen_encryption_key').val();


$(document).ready(function () {

    $('.checkout').each(function () {

        var $guestButton, $checkout, $navigations, $contentContainer, $contents, index, messageService;


        $guestButton = $('.js-button-guestcheckout');
        $checkout = $(this);
        $navigations = $checkout.find('.checkout__navigation');
        $contentContainer = $checkout.find('.checkout__contents')
        $contents = $contentContainer.find('.checkout__content')

        $contentContainer.css({'width': 100 * $contents.size() + '%'});
        $contents.css({'width': 100 / $contents.size() + '%'});

        messageService = new MessageService();

        index = 0;

        validateCheckout();
        updateStep();



        $contents.find('.checkout__step-button').click(function () {
            if ((validateStep(index).valid && !!validateCreditCard()) && index < $contents.size() - 1) {
                index++;
            }

            updateStep();
        });

        $navigations.click(function () {
            var newIndex = $navigations.index($(this));

            if (newIndex < index || (validateStep(index).valid && !!validateCreditCard())) {
                index = newIndex;
            }

            updateStep();
        });

        $guestButton.click(function () {
            $checkout.show();
            scrollTo($('.checkout__headline'), 1, function () {
                $('.login-slider').remove();
                $(window).scrollTop(0);
            });
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


        function validateStep (index) {
            var validationResult = validateForm($contents.eq(index));

            if (validationResult.valid) {
                $contents.eq(index).find('.checkout__step-button').prop('disabled', false);
            } else {
                $contents.eq(index).find('.checkout__step-button').prop('disabled', true);
            }

            return validationResult;
        }


        $(document).on([
            INPUT_EVENTS.VALIDATION_UPDATED,
            RADIO_EVENTS.VALIDATION_UPDATED,
            CHECKBOX_EVENTS.VALIDATION_UPDATED
        ].join(' '), validateCheckout);

        function validateCheckout () {
            var result = {
                valid: true,
                messages: []
            };

            for (let i = 0; i < $contents.size(); i++) {
                var validationResult = validateStep(i);

                result.valid = result.valid && validationResult.valid;
                result.messages = [].concat(result.messages, validationResult.messages);
            }

            return result;
        }


        $checkout.submit(function (event) {
            event.preventDefault();

            var values = {};


            $.each($checkout.serializeArray(), function (i, field) {
                if (field.name.indexOf('checkout') > -1) {
                    if (field.name.indexOf('adyen_encrypted') === -1) {
                        values[field.name] = field.value;
                    }
                }
            });


            // TODO: validation should not update value
            var encryptedData = validateCreditCard()
            if (encryptedData) {

                if (typeof encryptedData === 'string') {
                    values['adyen-encrypted-data'] = encryptedData;
                }

                $.post($checkout.attr('action'), values)
                .done(function (response) {
                    if (response.success) {
                        window.location = response.url;

                    } else if (response.errors) {

                        $.each(response.errors, function (index, value) {
                            messageService.add({ type: 'invalid', message: value.message + ' (' + value.errorCode + ')' });
                        });

                    } else {

                        messageService.add({ type: 'invalid', message: 'Es ist ein Fehler aufgetreten. Leider konnte Ihre Bestelung nicht aufgebeben werden.' });
                    }
                })
                .fail(function () {
                    messageService.add({ type: 'invalid', message: 'Es ist ein Fehler aufgetreten. Leider konnte Ihre Bestelung nicht aufgebeben werden.' });
                })
                .always(function () {
                    $('html, body').animate({scrollTop: 0}, 'slow');
                });
            }
        });



        function validateCreditCard () {
            if ($('[name="checkout[adyen_payment][payment_method]"]:checked').val() === 'adyen.payment.method.creditcard.cse') {
                var cardData, encryptedData, cseInstance;

                cardData = {};

                $('[data-encrypted-name]').each(function () {
                    var $input = $(this);

                    cardData[$input.data('encrypted-name')] = $input.val();
                });

                cseInstance = adyen.encrypt.createEncryption(ADYEN_KEY, {});
                encryptedData = cseInstance.encrypt(cardData);

                if (!encryptedData) {
                    index = 1;
                    updateStep();

                    messageService.add({ type: 'invalid', message: 'Die eingegeben Kredikarten-Informationen sind ungültig.' });
                }

                return encryptedData;

            } else {
                return true
            }
        }



        $(document).on(EVENTS.UPDATE_CART, function () {
            $.ajax({
                url : '/checkout/ajax-cart',
                method: 'GET',
                dataType: 'html'
            })
            .done(renderCart)
            .fail(function(data) {
                console.log('[ERROR] ');
                console.log(data);
            });
        });



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
        }

    });

});



export { EVENTS };
