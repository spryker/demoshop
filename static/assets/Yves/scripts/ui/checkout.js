'use strict';

var $ = require('jquery');

var $nameInput,
    $emailInput,
    $addressInput,
    $addressCheckbox,
    $deliveryAddressInput,
    $addressButton,
    $paymentButton,
    $paymentPayolutionOption,
    $shipmentButton,
    $addressElements,
    $addressValidationResult;

var initValidation = function () {
    $nameInput = $('.js-checkout-name');
    $emailInput = $('.js-checkout-email');
    $addressInput = $('.js-invoice-address');
    $addressCheckbox = $('.js-delivery-address-checkbox');
    $deliveryAddressInput = $('.js-delivery-address');
    $addressButton = $('.js-address-button');
    $paymentButton = $('.js-payment-button');
    $paymentPayolutionOption = $('[name="checkout[payment_method]"][value="payolution-invoice"]');
    $shipmentButton = $('.js-shipment-button');
    $('.js-checkout-address input, .js-checkout-address textarea').keyup(validateAddressBlock);
    $addressCheckbox.click(validateAddressBlock);
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

        $('input[name="checkout[payment_method]"]').on('change', function (event) {
            $paymentButton.attr('disabled', $('input[name="checkout[payment_method]"]:checked').length != 1);

            var $payolutionForm = $('.js-payolution-payment');
            if ('invoice' === event.target.value && event.target.checked) {
                $payolutionForm.show();
            } else {
                $payolutionForm.hide();
            }
        });

        $('input[name="checkout[id_shipment_method]"]').on('change', function () {
            $shipmentButton.attr('disabled', $('input[name="checkout[id_shipment_method]"]:checked').length != 1);
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
        });

        $('.js-payment-button').click(function (event) {
            event.preventDefault();
            $('.js-checkout-payment').addClass('js-checkout-collapsed js-checkout-completed');
            $('.js-checkout-shipment').removeClass('js-checkout-collapsed');
        });

        $('.js-shipment-button').click(function (event) {
            event.preventDefault();
            $('.js-checkout-shipment').addClass('js-checkout-collapsed js-checkout-completed');
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
