if (braintree && braintreeClientToken) {
    braintree.setup(braintreeClientToken, 'custom', {
        id: 'payment-form',
        hostedFields: {
            number: {
                selector: '#card-number'
            },
            cvv: {
                selector: '#cvv'
            },
            expirationDate: {
                selector: '#expiration-date'
            }
        },
        paypal: {
            container: 'pay-pal-container'
        }
    });
}
