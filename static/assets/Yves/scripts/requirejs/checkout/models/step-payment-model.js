/*global
  define: false,
  console: false
*/
define([
  'backbone',
  'lodash',
  'checkout/models/checkout-step-model'
], function( Backbone, _, CheckoutStep ){
  'use strict';

  return CheckoutStep.extend({
    defaults : function(){
      return _.extend( this.generateDefaults(), {
        name : 'payment',

        cart: {
          content : {
            itemCount: 0
          },
          'totals': {
            subtotalWithoutExpenses: 0,
            grandTotal             : 0,
            shippingCosts          : 0,
            taxes                  : 0
          }
        },

        paymentData : {}
      });
    },

    storePayment : function( paymentData ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cPaymentModel%c➨%c storePayment',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        paymentData
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.set({
        paymentData : paymentData
      });

      return this;
    },

    blockIfNeeded : function( bool ){
      var data = this.get( 'paymentData' );
//      console.log( 'block if needed' );

      if ( bool || ( ! Object.keys( data ).length && ! this.get( 'skip' ))){
        this.set({
          enabled : false,
          done    : false,
          active  : false
        });
      }

      return this;
    },

    maskCardNumber : function( number ){
      return '**** **** **** ' + number.toString().substr( -4 );
    },

    setCartTotals: function (totalsObj) {
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log('%cPaymentModel%c➨%c cartTotalsUpdate : %c' + JSON.stringify(totalsObj),
        'background:#176;color:#fff;padding:0 2px;border-radius:3px',
        'color:#176',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var cart = this.get('cart');
      cart.totals = totalsObj;
      this.set('cart', cart);
    }
  });
});
