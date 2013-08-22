/*global
  define: false,
  console: false
*/
define([
  'jquery',
  'vent',
  'lodash',


  'tracking/double-click',
  'tracking/tag-commander',

  'checkout/views/checkout-step-view'
], function( $, Vent, _, DC, TC,  CheckoutStepView ){
  'use strict';

  return CheckoutStepView.extend({
    templateID : 'checkout-step-review-template',

    cartExpensesTemplate : _.template( $( '#checkout-step-review-cart-expenses-template' ).html()),

    initialize : function(){
      var stepView  = this;
      var stepModel = this.model;

      this.model.on( 'change:active', this.render, this );
      this.model.on( 'change:shipping_address change:billing_address change:payment', this.renderForced, this );
      this.model.on( 'change:cart', this.postRender, this );
      this.model.on( 'change:busy', this.setBusy, this );

      Vent.on({
        'submitOrderAjax.done' : function(){
          stepModel.set({
            busy : false
          });
        }
      });

      this.$el.on({
        'click' : function( ev ){
          ev.preventDefault();

          if ( ! stepModel.get( 'busy' )) {
            stepModel.set({
              busy : true
            });

            stepView.model.finish();
          }
        }
      }, '.submit-button' );
    },

    renderForced : function(){
      if ( ! this.model.enabled()){
        return this;
      }

      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cReviewView%c➨%c renderForced',
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        ''
      );
      //>>excludeEnd( 'consoleLogExclude' );

      return this.checkoutStepRender({
        force : true
      });
    },

    setBusy : function(){
      var $button = this.$el.find( '.submit-button' );
      var busy    = this.model.get( 'busy' );
      var labels  = $button.data( 'labels' );

      $button.toggleClass( 'processing', busy );

      if ( labels ){
        $button.text( labels[ busy ? 'busy' : ( this.model.get( 'manual' ) ? 'manual' : 'idle' )]);
      }
    },

    render : function(){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cReviewView%c➨%c render',
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        ''
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.checkoutStepRender({
        force : true
      });

      // the model is inactive, so we don't need to do squat ;-)
      if ( ! this.model.active()){
        return this;
      }

      if ( this.model.get( 'manual' ) ){
        var $cartTable = this.$el.find( '.cart-table' );

        var cartTotalReplacementHTML = '<td colspan="5" class="manual-cart-total-info">' +
          $( '#checkout-step-review-template' ).data( 'label-for-manual-total' );

        $cartTable
          .find( '.cart-total-container' )
            .html( cartTotalReplacementHTML )
            .parent()
              .addClass( '.checkout-expenses-disclaimer' );

        $cartTable
          .find( '.cart-expenses-container' )
            .find( '.taxes,.shipping-costs' )
              .remove();
      }

      var tcData = {
        'page_cat1' : this.model.get( 'manual' ) ? 'review.manual' : 'review'
      };

      DC.event( 'pageView', 'review' );
      TC.event( 'tc_events_1', '17', tcData );

      return this;
    },

    postRender : function(){
      var cart = this.model.get( 'cart' );
      $( '#cart-expenses-container-content').html(this.cartExpensesTemplate( cart ));
      $( '#cart-total-grand-total').html( cart.totals.grandTotal );
      if (cart.totals.customsAndDuties && cart.totals.customsAndDuties !== '$0.00') {
        $('.review-disclaimer.review-disclaimer-customs').removeClass('hidden');
      } else {
        $('.review-disclaimer.review-disclaimer-customs').addClass('hidden');
      }
    }
  });
});
