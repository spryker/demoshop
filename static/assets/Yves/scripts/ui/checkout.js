'use strict';

var $ = require('jquery');

var $nameInput,
    $emailInput,
    $addressInput,
    $addressCheckbox,
    $deliveryAddressInput,
    $addressButton,
    $paymentButton,
    $shipmentButton,
    $useCouponButton,
    $removeCouponLink,
    $couponElement,
    $cartSection,
    $checkoutAddCouponUrlInput,
    $checkoutRemoveCouponUrlInput,
    $cartCouponCodeInput,
    $addressElements,
    $shippingCountry,
    $addressValidationResult,
    $addressCountry,
    $shipmentFeeUrl,
    $shipmentFee,
    $adyenPaymentForm;

var initValidation = function () {
    $shipmentFee = $('.js-cart-shipping');
    $nameInput = $('.js-checkout-name');
    $emailInput = $('.js-checkout-email');
    $addressInput = $('.js-invoice-address');
    $addressCheckbox = $('.js-delivery-address-checkbox');
    $deliveryAddressInput = $('.js-delivery-address');
    $addressButton = $('.js-address-button');
    $paymentButton = $('.js-payment-button');
    $shipmentButton = $('.js-shipment-button');
    $addressCountry = $('.js-country');
    $shippingCountry = $('#checkout_billing_address_country');
    $shipmentFeeUrl = $('#addShipmentFee');
    $useCouponButton = $('.js-cart-use-coupon-button');
    $removeCouponLink = $('.js-cart__remove-coupon-link');
    $adyenPaymentForm = $('#adyen-encrypted-form');
    $cartSection = $('.cart__final .cart__discount').parent();
    $checkoutAddCouponUrlInput = $('.cart__final #checkoutAddCouponUrl');
    $checkoutRemoveCouponUrlInput = $('.cart__final #checkoutRemoveCouponUrl');
    $cartCouponCodeInput = $('.cart__final #cart__coupon-code');
    $('.js-checkout-address input, .js-checkout-address textarea').keyup(validateAddressBlock);
    $addressCheckbox.click(validateAddressBlock);
    $useCouponButton.click(addCoupon);
    $removeCouponLink.click(removeCoupon);
    registerAdyenPaymentForm();
};

var registerAdyenPaymentForm = function()
{
    if($adyenPaymentForm.length) // if form was found on the page
    {
        var form = $adyenPaymentForm[0];
        var key = "10001|A335386FB3B6B5BB4AA6CDC8AD5764BB6F20FE1087C8BC5FF8CCA1D6974E3D48D5967FCFD829BF74A1B0E12FCFF07D60DB02AE5225C49F7F4B054A4D7FADE8BCA6B7D23FA2E763746609706552E4D53D57F14A4DC937C92214B660FB9C3332C96EAB068E8436A6428A9AED8DBB4D1A5B3B15BA97927963CD6229210439293EBCC8E00C022EE2746C8F7E1F9C44271C8DC376AF4BC2448507A2DBF60401BFCCAA9AEEE65A43671C74BFBA89ED136DD8E8414F17C1EF5CBD3158E9BDA27095A6656E9C4C4FAF61F1B7FF7FED8C5BC971D460E106AF5007F606898175BC30BBD9C7AFD1E54A86584CFB9B38AF3A63B39AE61485DAB8B60ADB94A399005192450B75";
        var options = {};
        adyen.encrypt.createEncryptedForm(form, key, options);
    }
};

var addCoupon = function (event) {
    event.preventDefault();
    $couponElement = $('.cart__final #cart__coupon-code');
    $useCouponButton.prop('disabled', true);
    $.ajax(
        {
            url : $checkoutAddCouponUrlInput.val(),
            method: "POST",
            data: { "couponCode" : $cartCouponCodeInput.val() },
            dataType: "html"
        }
    ).done(function(data) {
            $cartSection.html(data);
            initValidation();
            $useCouponButton.prop('disabled', false);
        }).fail(function(data) {
            console.log('[ERROR] ');
            console.log(data);
        }
    );
};

var removeCoupon = function (event) {
    event.preventDefault();
    $.ajax(
        {
            url : $checkoutRemoveCouponUrlInput.val(),
            method: "POST",
            data: { "couponCode" : $(this).data('couponCode') },
            dataType: "html"
        }
    ).done(function(data) {
            $cartSection.html(data);
            initValidation();
        }).fail(function(data) {
            console.log('[ERROR] ');
            console.log(data);
        }
    );
};

var getShipmentPrice = function (event) {
    $.ajax(
        {
            url : $shipmentFeeUrl.val(),
            method: "POST",
            data: { "fkCountry" : $shippingCountry.val() },
            dataType: "html"
        }
    ).done(function(data) {
            $cartSection.html(data);
            initValidation();
    }).fail(function(data) {
            //@TODO think about error handling
        }
    );
};

var validateAddressBlock = function () {
    $addressElements = $('#checkout_billing_address').children();

    if ($($addressCheckbox).is(':checked')) {
        $.merge($addressElements, $('#checkout_shipping_address').children());
    }

    $addressValidationResult = 1;
    $addressElements.each(function ($id, $element) {
            $addressValidationResult = $addressValidationResult && $($element).val().length;
        }
    );

    if ($addressValidationResult) {
        $addressButton.attr('disabled', false);
    } else {
        $addressButton.attr('disabled', true);
    }
};

var generalError = function () {
    $('#backend-errors').empty();

    $('#backend-errors').append('<div>Es ist ein Fehler aufgetreten! Leider konnte Ihre Bestelung nicht aufgebeben werden!</div>');

    $('#backend-errors-section').show();
    $("html, body").animate({scrollTop: 0}, "slow");
};

function postForm($form, callback) {
    var values = {};
    $.each($form.serializeArray(), function (i, field) {
        values[field.name] = field.value;
    });

    $.post($form.attr('action'), values)
        .done(function (data) {
            callback(data);
        })
        .fail(function () {
            generalError;
        });
}

module.exports = {

    init: function () {
        initValidation();

        $('input[name="checkout[adyen_payment][payment_method]"]').on('change', function () {
            $paymentButton.attr('disabled', $('input[name="checkout[adyen_payment][payment_method]"]:checked').length != 1);
        });

        $addressCheckbox.on('change', function (e) {
            if ($addressCheckbox.is(':checked')) {
                $('.js-delivery-address').show();
            } else {
                $('.js-delivery-address').hide();
            }
        });

        $('.login__skip').click(function () {
            $('.js-checkout-address').removeClass('js-checkout-collapsed');
            $('.js-checkout-login').addClass('js-checkout-collapsed');

            // if logged in, prefill email and name
            //   if has address, prefill too
            //   else focus address
            // else focus email
            $('.js-checkout-email').focus();
        });

        $('.js-address-button').click(function (event) {
            event.preventDefault();
            $('.js-checkout-address').addClass('js-checkout-collapsed js-checkout-completed');
            $('.js-checkout-payment').removeClass('js-checkout-collapsed');
            getShipmentPrice(event);
        });

        $('.js-payment-button').click(function (event) {
            event.preventDefault();
            $('.js-checkout-payment').addClass('js-checkout-collapsed js-checkout-completed');
            $('.js-checkout-confirm').removeClass('js-checkout-collapsed');
            $('.js-checkout-cart').hide();
        });

        $('.js-edit-formblock').click(function (event) {
            event.preventDefault();
            $('.js-form-block').addClass('js-checkout-collapsed');
            $(event.currentTarget).parents('.js-form-block').removeClass('js-checkout-collapsed');
            $('.js-checkout-cart').show();
        });

        $('.js-confirm-agb').click(function (event) {
            if ($(event.currentTarget).is(':checked')) {
                $('.js-checkout-submit').attr('disabled', false)
            } else {
                $('.js-checkout-submit').attr('disabled', true)
            }
        });

        $('[name="checkout"]').submit(function (e) {
            e.preventDefault();

            postForm($(this), function (response) {
                if (response.success) {
                    window.location = response.url;
                } else if (response.errors) {
                    $('#backend-errors').empty();

                    $.each(response.errors, function (index, value) {
                        $('#backend-errors').append('<div>Fehler ' + value.errorCode + ': ' + value.message + '</div>');
                    });

                    $('#backend-errors-section').show();
                    $("html, body").animate({scrollTop: 0}, "slow");
                } else {
                    generalError;
                }
            });

            return false;
        });

        if (window.location.pathname.match(/^\/checkout/)) {
            $('.js-shopping-cart').hide();
        }
    }
};
