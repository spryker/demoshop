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
        name : 'shipping-address',

        addressData : null, //model.getCachedAddressData(),
        synced      : false,
        manual      : true,
        xhr         : null
      });
    },

    getCachedAddressData : function(){
      var data = LS.get( 'checkout:shipping-address' );
      return data ? JSON.parse( data ) : null;
    },

    // store address
    storeAddress : function( addressData ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cAddressShippingModel%c➨%c storeAddress',
        'background:#093;color:#fff;padding:0 2px;border-radius:3px',
        'color:#093',
        '',
        addressData
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.set({
        addressData : addressData
      }).trigger( 'cloneAddress', {addressData: addressData} );

      if ( addressData.shippingAsBilling || ! this.get( 'backToReview' )){
        this.trigger( 'cloneAddress', {
          addressData  : addressData,
          backToReview : this.get( 'backToReview' )
        });
      }

      LS.set( 'checkout:shipping-address', JSON.stringify( addressData ));

      return this;
    }
  });
});
