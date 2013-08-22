/*global
  define: false,
  console: false,
  window: false
*/
define([
  'jquery',
  'backbone',
  'lodash',

  'tracking/double-click',
  'tracking/tag-commander',

  'checkout/views/checkout-step-view'
], function( $, Backbone, _, DC, TC, CheckoutStepView ){
  'use strict';

  return CheckoutStepView.extend({
    templateID : 'checkout-step-payment-template',

    cartSummaryTemplateID : 'checkout-step-payment-cart-summary-template',
    cartSummaryTemplate : null,

    initialize : function(){

      var stepView  = this;
      var stepModel = this.model;

      // credit cards regexps
      var ccDefs = {
        'amex'       : /^3/,
        'discover'   : /^6/,
        'mastercard' : /^5/,
        'visa'       : /^4/
      };

      this.cartSummaryTemplate = _.template($('#' + this.cartSummaryTemplateID).html());

      this.$el.formValidate({
        // "custom" selector not to validate invisible fields - due to fieldsets visibility
        inputSelector : ':input[required]:visible,:input[pattern]:visible'
      }).on({
        'submit' : function( ev ){
          ev.preventDefault();

          var $form = $( ev.target );

          if( ! stepView.validateExpirationDate( $form )){
            return false;
          }

          // reset the hidden fields
          $form.find( ':input:hidden' ).not( '[type="hidden"]' ).each( function(){
            $( this ).val( '' );
          });

          // reset the detected cards
          $( '#new-card-number' ).trigger( 'change.detect' );

          var formData = $form.formObject()[ $form.attr( 'id' )];

          // mask the card number for review
          formData.cardNumberMasked = stepModel.maskCardNumber( formData.cardNumber );

          stepModel.storePayment( formData ).finish( $form.attr( 'action' ));

          return false;
        }
      }).on({
        'click' : function( ev ){
          ev.preventDefault();

          var options = [
            'width=400',

            'scrollbars',
            'dependent',
            'dialog',

            'menubar=0',
            'toolbar=0',
            'personalbar=0',
            'resizable=0',
            'status=0'
          ];

          window.open( ev.target.href, 'securityCodeInformation', options.join( ',' ));
        }
      }, '.popup' ).on({
        // toggle visibility of fieldsets for checked radioboxes
        'change' : function( ev ){
          stepView.$el
            .find( '.fieldsets.active' )
              .removeClass( 'active' )
              .addClass( 'inactive' );

          $( ev.target )
            .parentsUntil( '.fieldsets' )
            .last()
              .parent()
                .addClass( 'active' )
                .removeClass( 'inactive' );
        }
      }, '.fieldset-toggle' ).on({
        // creditcard number detect
        'change.detect keyup.detect click.detect' : function( ev ){
          var number = ev.target.value;

          var matchedCC = null;

          _.each( ccDefs, function ( v, i ){
            if ( v.test( number )){
              matchedCC = i;
              return false;
            }
          });

          if ( ! stepView.$cardsList || ! stepView.$cardsList.length ){
            stepView.$cardsList = $( '#creditcards-list' );
          }

          if ( ! stepView.$detectedCard || ! stepView.$detectedCard.length ){
            stepView.$detectedCard = $( '#detected-card' );
          }

          if ( matchedCC ) {
            stepView.$cardsList
              .addClass( 'matched-a-card' )
              .children( '.matched-card' )
                .removeClass( 'matched-card' )
                .end()
              .children( '.payment-' + matchedCC )
                .addClass( 'matched-card' );
          } else {
            stepView.$cardsList
              .removeClass( 'matched-a-card' );
          }

          stepView.$detectedCard
            .val( matchedCC || 'unknown' );

          var $ccInfoAnchor = stepView.$el.find( 'a.popup' );

          $ccInfoAnchor.attr(
            'href',
            $ccInfoAnchor
              .attr( 'href' )
                .replace( /#.+/, '' ) + '#' + matchedCC
          );

        }
      }, '#new-card-number' ).on({
        'luhnValidate' : function( ev, valid ){
          $( ev.target ).parent().find( 'input[name="luhnValid"]' ).val( valid );
        }
      });

      this.model.on( 'change:active', this.render, this );
      this.model.on( 'change:backToReview', this.adjustRouting, this );
      this.model.on( 'change:cart', this.postRender, this );
      this.model.on( 'done', this.resetRouting, this );
    },

    validateExpirationDate : function( $form ){
      var $month = $form.find( '[name="cardExpirationMonth"]:visible' );
      var $year  = $form.find( '[name="cardExpirationYear"]:visible' );

      var month = parseInt( $month.val(), 10 );
      var year  = parseInt( $year.val(), 10 );

      if ( ! month  || ! year ){
        return true;
      }

      var today = new Date();

      if ( year > today.getFullYear()){
        return true;
      }

      if ( month > today.getMonth() + 1 ){
        return true;
      }

      $month.addErrorLabel( $form, {
        injectInto : $month.parent().parent().find( '.expiration-error' )
      }, 'expiration-date' );
      return false;
    },

    render : function( opts ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cPaymentStepView%c➨%c render : %c' + this.model.get( 'name' ),
        'background:#369;color:#fff;padding:0 2px;border-radius:3px',
        'color:#369',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.checkoutStepRender( opts );

      // the model is inactive, so we don't need to do squat ;-)
      if ( ! this.model.active()){
        return this;
      }

      var tcData = {
        'page_cat1' : 'payment'
      };

      if ( this.model.get( 'backToReview' )){
        tcData[ 'change.shipping' ] = true;
      }

      DC.event( 'pageView', 'checkout' );
      TC.event( 'tc_events_1', '16', tcData );

      return this;
    },

    postRender : function(){
      var cart = this.model.get('cart');
      $('#cart-summary').html(this.cartSummaryTemplate(cart));
    }
  });
});
