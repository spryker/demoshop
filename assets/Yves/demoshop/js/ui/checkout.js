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
    $createAccountCheckbox,
    $addressValidationResult;

var initValidation = function() {
    $nameInput = $('.js-checkout-name');
    $emailInput = $('.js-checkout-email');
    $addressInput = $('.js-invoice-address');
    $addressCheckbox = $('.js-delivery-address-checkbox');
    $createAccountCheckbox = $('#checkout_create_account');
    $deliveryAddressInput = $('.js-delivery-address');
    $addressButton = $('.js-address-button');
    $paymentButton = $('.js-payment-button');
    $paymentPayolutionOption = $('[name="checkout[payment_method]"][value="payolution-invoice"]');
    $shipmentButton = $('.js-shipment-button');
    $('.js-checkout-address input, .js-checkout-address textarea').keyup(validateAddressBlock);
    $addressCheckbox.click(validateAddressBlock);
};

var validateAddressBlock = function() {
    $addressElements = $('#checkout_billing_address').children();

    if ($($addressCheckbox).is(':checked')) {
        $.merge($addressElements, $('#checkout_shipping_address').children());
    }

    $addressValidationResult = 1;
    $addressElements.each(function($id, $element) {
        $addressValidationResult = $addressValidationResult && $($element).val().length;
    });

    if ($addressValidationResult) {
        $addressButton.attr('disabled', false);
    } else {
        $addressButton.attr('disabled', true);
    }
};

var generalError = function() {
    $('#backend-errors').empty();

    $('#backend-errors').append('<div>Es ist ein Fehler aufgetreten! Leider konnte Ihre Bestelung nicht aufgebeben werden!</div>');

    $('#backend-errors-section').show();
    $("html, body").animate({ scrollTop: 0 }, "slow");
};

function postForm($form, callback) {
    var values = {};
    $.each($form.serializeArray(), function(i, field) {
        values[field.name] = field.value;
    });

    $.post($form.attr('action'), values)
        .done(function(data) {
            callback(data);
        })
        .fail(function() {
            generalError;
        });
}

module.exports = {

    init: function() {
        initValidation();

        var billingInputs = [
            'checkout_email',
            'checkout_billing_address_first_name',
            'checkout_billing_address_last_name',
            'checkout_billing_address_street',
            'checkout_billing_address_street_nr',
            'checkout_billing_address_city',
            'checkout_billing_address_zip_code',
        ];

        var shippingInputs = [
            'checkout_shipping_address_first_name',
            'checkout_shipping_address_last_name',
            'checkout_shipping_address_street',
            'checkout_shipping_address_street_nr',
            'checkout_shipping_address_city',
            'checkout_shipping_address_zip_code',
        ];

        $('input[name="checkout[payment_method]"]').on('change', function(event) {
            $paymentButton.attr('disabled', $('input[name="checkout[payment_method]"]:checked').length != 1);

            var $payolutionInstallmentForm = $('.js-payolution-installment');
            if ('payolution_installment' === event.target.value && !!event.target.checked) {
                $payolutionInstallmentForm.show();
            } else {
                $payolutionInstallmentForm.hide();
            }
        });

        $('form.checkout-form').on('submit', function(event) {
            $('button[name="summaryForm[checkout.step.place.order]"]').attr('disabled', 'disabled');
        })

        $('input[name="checkout[id_shipment_method]"]').on('change', function() {
            $shipmentButton.attr('disabled', $('input[name="checkout[id_shipment_method]"]:checked').length != 1);
        });

        $addressCheckbox.on('change', function(e) {
            if ($addressCheckbox.is(':checked')) {
                $('.js-delivery-address').show();
            } else {
                $('.js-delivery-address').hide();
            }
        });

        $createAccountCheckbox.on('change', function(e) {
            if ($createAccountCheckbox.is(':checked')) {
                $('#create_account').show();
            } else {
                $('#create_account').hide();
            }
        });


        $('.login__skip').click(function() {
            $('.js-checkout-address').removeClass('js-checkout-collapsed');
            $('.js-checkout-login').addClass('js-checkout-collapsed');

            // if logged in, prefill email and name
            //   if has address, prefill too
            //   else focus address
            // else focus email
            $('.js-checkout-email').focus();
        });

        $('.js-address-button').click(function(event) {
            event.preventDefault();

            $('.js-checkout-address').addClass('js-checkout-collapsed js-checkout-completed');

            var checkoutAddress = $(event.currentTarget).parents('.js-checkout-address');
            if (checkoutAddress.length > 0) {
                var summaryBilling = '';
                var summaryShipping = '';
                $('.js-checkout-address input').each(function(i, el) {
                    if (!el.value) {
                        return;
                    }
                    if (billingInputs.indexOf(el.id) != -1) {
                        summaryBilling += el.placeholder + ': ' + el.value + '<br />';
                    }
                    if (shippingInputs.indexOf(el.id) != -1) {
                        summaryShipping += el.placeholder + ': ' + el.value + '<br />';
                    }
                });

                if (!summaryShipping) {
                    summaryShipping = summaryBilling;
                }

                $('#summary-text').show();
                $('#summary-text-shipping').html(summaryShipping);
                $('#summary-text-billing').html(summaryBilling);
                $('#address-fields').hide();
                $(checkoutAddress).find('.form-block__edit').show();
                $(event.currentTarget).hide();
            } else {
                $('.js-checkout-address').addClass('js-checkout-collapsed js-checkout-completed');
            }

            $('.js-checkout-shipment').removeClass('js-checkout-collapsed');

        });

        $('.js-shipment-button').click(function(event) {
            event.preventDefault();
            $('.js-checkout-shipment').addClass('js-checkout-collapsed js-checkout-completed');
            $('.js-checkout-payment').removeClass('js-checkout-collapsed');
            $('.js-payolution-installment').hide();
        });

        $('.js-payment-button').click(function(event) {
            event.preventDefault();
            $('.js-checkout-payment').addClass('js-checkout-collapsed js-checkout-completed');
            $('.js-checkout-confirm').removeClass('js-checkout-collapsed');
            $('.js-checkout-cart').hide();
        });

        $('.js-edit-formblock').click(function(event) {
            event.preventDefault();
            if ($(event.currentTarget).parents('.js-checkout-address').length > 0) {
                $('#address-fields').show();
                $('#summary-text').hide();
                $('.js-address-button').show();
            }
            $('.js-form-block').addClass('js-checkout-collapsed');
            $(event.currentTarget).parents('.js-form-block').removeClass('js-checkout-collapsed');
            $('.js-checkout-cart').show();
        });

        $('.js-confirm-agb').click(function(event) {
            if ($(event.currentTarget).is(':checked')) {
                $('.js-checkout-submit').attr('disabled', false)
            } else {
                $('.js-checkout-submit').attr('disabled', true)
            }
        });

        $('[name="checkout"]').submit(function(e) {
            e.preventDefault();

            postForm($(this), function(response) {
                if (response.success) {
                    window.location = response.url;
                } else if (response.errors) {
                    $('#backend-errors').empty();

                    $.each(response.errors, function(index, value) {
                        $('#backend-errors').append('<div>Fehler ' + value.errorCode + ': ' + value.message + '</div>');
                    });

                    $('#backend-errors-section').show();
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                } else {
                    generalError;
                }
            });

            return false;
        });

        if (window.location.pathname.match(/^\/checkout/)) {
            $('.js-shopping-cart').hide();
        }

        /**
         *
         * Checkout graphics
         *
         */

        function selectCustomer() {
            var value = $(this).val();
            $('.customer-selection').removeClass('show');
            $('.customer-selection-' + value).addClass('show');
        }

        function selectShippingCustomAddress() {
            $('.address-user-shipping-custom').toggleClass('show', !$(this).val());
        }

        function selectBillingAddress() {
            $('.address-user-billing').toggleClass('show', !$(this).prop('checked'));

            if ($(this).prop('checked')) {
                $('.address-user-billing-custom').removeClass('show');
            } else {
                $('.address-user-billing select').trigger('change');
            }
        }

        function selectBillingCustomAddress() {
            $('.address-user-billing-custom').toggleClass('show', !$(this).val());
        }

        function selectAddress() {
            $('.address-selection').toggleClass('show', !$(this).prop('checked'));
        }

        function selectShipment() {
            var index = $('.checkout-shipment input[type="radio"]').index(this);
            $('.shipement-method').removeClass('show');
            if (index > -1) $('.shipment-method').eq(index).addClass('show');
        }

        function selectPayment() {
            var index = $('.checkout-payment input[type="radio"]').index(this);
            $('.payolution-form').removeClass('show');
            if (index > -1) $('.payolution-form').eq(index).addClass('show');
        }

        selectCustomer.apply($('.customer-option:checked'));
        $('.customer-option').on('change', selectCustomer);

        if ($('.address-user-shipping, .address-user-billing').length > 0) {
            selectShippingCustomAddress.apply($('.address-user-shipping select'));
            $('.address-user-shipping select').on('change', selectShippingCustomAddress);

            selectBillingAddress.apply($('.address-option input'));
            $('.address-option input').on('change', selectBillingAddress);

            if (!$('.address-option input').prop('checked')) {
                selectBillingCustomAddress.apply($('.address-user-billing select'));
            }

            $('.address-user-billing select').on('change', selectBillingCustomAddress);
        } else {
            selectAddress.apply($('.address-option input'));
            $('.address-option input').on('change', selectAddress);
        }

        selectShipment.apply($('.checkout-shipment input[type="radio"]:checked'));
        $('.checkout-shipment input[type="radio"]').on('change', selectShipment);

        selectPayment.apply($('.checkout-payment input[type="radio"]:checked'));
        $('.checkout-payment input[type="radio"]').on('change', selectPayment);
    }
};
