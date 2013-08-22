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
        name   : 'review',
        manual : false,

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

        shippingAddress : {},
        billingAddress  : {},
        payment         : {}
      });
    },

    setShippingAddress : function( data ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cReviewModel%c➨%c setShippingAddress',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        data
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.set({
        shippingAddress : data
      });
    },

    setBillingAddress  : function( data ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cReviewModel%c➨%c setBillingAddress',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        data
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.set({
        billingAddress : data
      });
    },

    setPayment         : function( data ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cReviewModel%c➨%c setPayment',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        data
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.set({
        payment : data
      });
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
    },

    blockIfNeeded : function( bool ){
      if ( bool ){
//        console.log( 'unset review' );
        this.set({
          enabled : false,
          done    : false,
          active  : false
        });
      }

      return this;
    }
  });
});
