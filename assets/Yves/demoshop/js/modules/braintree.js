/**
 * Demoshop theme braintree module
 */

'use strict';

require('./main');
var braintree = require('braintree-web');
var $braintreeContanier = $('[data-braintree-client-token]');
var braintreeClientToken = !!$braintreeContanier.length ? $braintreeContanier.data('braintree-client-token') : null;

if (!!braintreeClientToken) {
    var braintreeSetupSettings = {
        id: 'payment-form'
    };

    if ($('[data-braintree-credit-card-method]').length) {
        braintreeSetupSettings.hostedFields = {
            number: {
                selector: "#card-number"
            },
            cvv: {
                selector: "#cvv"
            },
            expirationDate: {
                selector: "#expiration-date"
            }
        };
    }

    if ($('[data-braintree-paypal-method]').length) {
        braintreeSetupSettings.paypal = {
            container: "paypal-container"
        };
    }

    braintree.setup(braintreeClientToken, 'custom', braintreeSetupSettings);

    if (!PRODUCTION) {
        console.log('braintreeClientToken', braintreeClientToken);
        console.log('braintreeSetupSettings', braintreeSetupSettings);
    }
}
