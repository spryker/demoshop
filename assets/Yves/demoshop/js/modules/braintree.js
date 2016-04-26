/**
 * Demoshop theme braintree module
 */

'use strict';

require('./main');
var braintree = require('braintree-web');

$(document).ready(function() {
    var $form = $('#payment-form');
    var $braintreeContanier = $('.braintree-method:first');
    var braintreeClientToken = !!$braintreeContanier.length ? ($braintreeContanier.data('braintree-client-token') || null) : null;

    function getPaymentMethod() {
        return $('#paymentForm_paymentSelection input:checked').val();
    }

    function getErrorTemplate(message) {
        return '<ul class="form-errors"><li>' + message + '</li></ul>'
    }

    function errorHandler(error) {
        var paymentMethod = getPaymentMethod();

        if (paymentMethod === 'braintreePayPal') {
            return $('.braintree-paypal-error').html(getErrorTemplate(error.message));
        }

        if (paymentMethod === 'braintreeCreditCard') {
            return $('.braintree-credit-card-error').html(getErrorTemplate(error.message));
        }

        return $form.submit();
    }

    function paymentMethodHandler(response) {
        var paymentMethod = getPaymentMethod();

        if ((paymentMethod === 'braintreePayPal' && response.type !== 'PayPalAccount') || (paymentMethod === 'braintreeCreditCard' && response.type !== 'CreditCard')) {
            return errorHandler({
                message: 'User did not enter a payment method'
            });
        }

        return $form.submit();
    }

    function readyHandler() {
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
