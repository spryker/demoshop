/*global
  define: false,
  console: false
*/
define([
  'backbone',
  'lodash',

  'checkout/models/checkout-step-model',
  'plugins/local-storage'
], function( Backbone, _, CheckoutStep, LS ){
  'use strict';

  return CheckoutStep.extend({
    defaults : function(){
      // var model = this;

      return _.extend( this.generateDefaults(), {
        name : 'billing-address',

        addressData : null //model.getCachedAddressData()
      });
    },

    getCachedAddressData : function(){
      var data = LS.get( 'checkout:shipping-address' );
      return data ? JSON.parse( data ) : null;
    },

    // store address
    storeAddress : function( addressData ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cAddressBillingModel%c➨%c storeAddress',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        addressData
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.set({
        addressData : addressData
      });

      return this;
    },

    // clone address - most likely, it's the shipping address
    cloneAddress : function( addressData, backToReview ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cAddressBillingModel%c➨%c cloneAddress',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        addressData
      );
      //>>excludeEnd( 'consoleLogExclude' );

      // if ( backToReview || addressData.shippingAsBilling ){
      var cleanAddress =  this.clearAddress( addressData, ! addressData.shippingAsBilling && ! backToReview );

      this.storeAddress( cleanAddress ).set({
        skip : addressData.shippingAsBilling
      }); //.finish();
      // }

      LS.set( 'checkout:shipping-address', JSON.stringify( addressData ));

      return this;
    },

    // clear the address
    clearAddress : function( addressData, clear ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cAddressBillingModel%c➨%c cleanAddress',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        addressData
      );
      //>>excludeEnd( 'consoleLogExclude' );

      if ( clear ){
        addressData = _.extend( {}, addressData );
        _.each( _.keys( addressData ), function( key ){
          if ( key !== 'country' ) {
            addressData[ key ] = '';
          }
        });
      }

      return addressData;
    }
  });
});
