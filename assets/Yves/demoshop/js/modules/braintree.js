/**
 * Demoshop theme braintree module
 */

'use strict';

require('./main');
var braintree = require('braintree-web');

$(document).ready(function() {
    var $form = $('#payment-form');
    var $errorContainers = $('.braintree-error');
    var $braintreeContanier = $('.braintree-method:first');
    var braintreeClientToken = !!$braintreeContanier.length ? ($braintreeContanier.data('braintree-client-token') || null) : null;

    function getPaymentMethod() {
        return $('#paymentForm_paymentSelection input:checked').val();
    }

    function getErrorTemplate(message) {
        return '<ul class="form-errors"><li>' + message + '</li></ul>'
    }

    function submitForm(nonce){
        $form.find('input[name="payment_method_nonce"]').val(nonce || '');
        // $form.submit();
    }

    function errorHandler(error) {
        var paymentMethod = getPaymentMethod();
        var isPayPal = (paymentMethod === 'braintreePayPal');
        var isCreditCard = (paymentMethod === 'braintreeCreditCard');

        $errorContainers.empty();

        if (isPayPal) {
            return $('.braintree-paypal-error').html(getErrorTemplate(error.message));
        }

        if (isCreditCard) {
            return $('.braintree-credit-card-error').html(getErrorTemplate(error.message));
        }

        return submitForm();
    }

    function paymentMethodHandler(response) {
        var paymentMethod = getPaymentMethod();
        var isWrongMethodSelected = (paymentMethod === 'braintreePayPal' && response.type !== 'PayPalAccount') || (paymentMethod === 'braintreeCreditCard' && response.type !== 'CreditCard');

        $errorContainers.empty();

        if (isWrongMethodSelected) {
            return errorHandler({
                message: 'User did not enter a payment method'
            });
        }

        return submitForm(response.nonce);
    }

    function readyHandler() {
        $form.append('<input type="hidden" name="payment_method_nonce">');

        $('.checkout-payment input[type="radio"]').on('change', function() {
            $form.find('input[name="payment_method_nonce"]').val('');
            $errorContainers.empty();
        });

        $('.braintree-loader').removeClass('show');
        $('.braintree-method').addClass('show');
    }

    function loadBraintree() {
        var braintreeSetupSettings = {
            id: 'payment-form',
            onReady: readyHandler,
            onPaymentMethodReceived: paymentMethodHandler,
            onError: errorHandler
        };

        if ($('.braintree-credit-card-method').length) {
            braintreeSetupSettings.hostedFields = {
                styles: {
                    'input': {
                        'font-size': '16px',
                        'color': '#333',
                        'font-family': 'Fira Sans, Arial, sans-serif'
                    }
                },
                number: {
                    selector: '#braintree-credit-card-number'
                },
                cvv: {
                    selector: '#braintree-credit-card-cvv'
                },
                expirationDate: {
                    selector: '#braintree-credit-card-expiration-date'
                }
            };
        }

        if ($('.braintree-paypal-method').length) {
            braintreeSetupSettings.paypal = {
                container: 'braintree-paypal-container'
            };
        }

        braintree.setup(braintreeClientToken, 'custom', braintreeSetupSettings);
    }

    if (!!braintreeClientToken) {
        loadBraintree();
    }
});
