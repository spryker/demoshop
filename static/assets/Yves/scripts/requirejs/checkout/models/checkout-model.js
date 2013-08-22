/*global
  define: false,
  console: false
*/
define([
  'backbone',
  'lodash',

  'checkout/models/step-address-shipping-model',
  'checkout/models/step-address-billing-model',
  'checkout/models/step-payment-model',
  'checkout/models/step-review-model'
], function(
  Backbone,
  _,

  StepAddressShipping,
  StepAddressBilling,
  StepPayment,
  StepReview
){
  'use strict';

  return Backbone.Model.extend({
    defaults : function(){
      var steps = {
        'shipping-address' : new StepAddressShipping({
          enabled : true,
          active  : true
        }),
        'billing-address'  : new StepAddressBilling(),
        payment            : new StepPayment(),
        review             : new StepReview()
      };

      // bind update for address
      steps[ 'shipping-address' ].on({
        'change:addressData' : function( model, addressData ){
          steps.review.setShippingAddress( addressData );
        },
        'cloneAddress' : function( data ){
          steps[ 'billing-address' ].cloneAddress( data.addressData, data.backToReview );
        }
      });

      // bind update for address
      steps[ 'billing-address' ].on( 'change:addressData', function( model, addressData ){
        steps.review.setBillingAddress( addressData );
      });

      // bind update for payment
      steps.payment.on( 'change:paymentData', function( model, paymentData ){
        steps.review.setPayment( paymentData );
      });

      var cart = {
        content : {
          itemCount: 0
        },
        'totals': {
          subtotalWithoutExpenses: 0,
          grandTotal             : 0,
          shippingCosts          : 0,
          taxes                  : 0
        }
      };

      steps.payment.set('cart', cart);

      return {
        // current step
        state : 'shipping-address',

        // use "manual checkout"
        // as in "skip payment and forward it to an agent to call the customer"
        manual : false,

        // available steps
        steps : steps,

        cart  : cart
      };
    },

    hasStep : function( step ){
      return this.get( 'steps' ).hasOwnProperty( step );
    },

    isEnabledStep : function( step ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutModel%c➨%c isEnabledStep : %c' + step,
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var steps = this.get( 'steps' );

      if ( ! steps.hasOwnProperty( step )){
        return undefined;
      }

      return steps[ step ].enabled();
    },

    enableStep : function( step ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutModel%c➨%c enableStep : %c' + step,
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var steps = this.get( 'steps' );

      if ( ! steps.hasOwnProperty( step )){
        return false;
      }

      steps[ step ].set({
        enabled : true
      });

      return true;
    },

    setCartTotals : function ( totalsObj ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutModel%c➨%c setCartTotals formattedValues : %c' + JSON.stringify(totalsObj),
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.get('cart').totals = totalsObj;
      this.get('steps').payment.setCartTotals(totalsObj);
      this.get('steps').review.setCartTotals(totalsObj);
    },

    setState : function( state ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutModel%c➨%c setState : %c' + state,
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var steps = this.get( 'steps' );
      var step  = steps[ state ];
      var currentState = this.get( 'state' );

      // debugger;

      if ( ! step ){
        return false;
      }

      if ( ! step.enabled()){
        return false;
      }

      // skip resetting the same step
      if ( step.get( 'name' ) === currentState ) {
        return true;
      }

      this.set({
        state : state
      });

      if ( currentState ){
        steps[ currentState ].set({
          active : false
        });
      }

      step.set({
        active : true
      });


      return true;
    }
  });
});
