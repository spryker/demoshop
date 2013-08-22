/*global
  define: false,
  console: false
*/
define([
  'jquery',
  'vent',

  'tracking/double-click',
  'tracking/tag-commander',

  'checkout/views/checkout-step-view'
], function( $, Vent, DC, TC, CheckoutStepView ){
  'use strict';

  return CheckoutStepView.extend({
    templateID    : 'checkout-step-shipping-address-template',
    defaultAction : '#step:billing-address',
    initialize    : function(){

      var stepView  = this;
      var stepModel = this.model;

      this.$el.formValidate().on({
        'submit' : function( ev ){
          ev.preventDefault();

          var $form = $( ev.target );
          var formData = $form.formObject()[ $form.attr( 'id' )];

          formData.countryFull = $form.find( '[name="country"] option:selected' ).text();
          formData.regionFull  = $form.find( '[name="region"]:visible' ).val();
          formData.manual      = stepModel.get( 'manual' );

          var action = $form.attr( 'action' );

          if ( ! stepModel.get( 'synced' )){
            var xhr = stepModel.get( 'xhr' );

            if ( ! xhr ){
              $form
                .find( '[data-required-for-quote]:enabled' )
                .first()
                  .trigger( 'change' );

              xhr = stepModel.get( 'xhr' );

              if ( ! xhr ){
                $form
                  .find( '[data-send-for-quote][value=""]:enabled:not([required])' )
                    .prop( 'disabled', true );
                $form
                  .find( '[data-required-for-quote]:enabled' )
                  .first()
                  .trigger( 'change' );
                xhr = stepModel.get( 'xhr' );
              }
            }

            stepView.disableForm( $form, true );

            xhr.always( function(){
              stepView.disableForm( $form, false );
              formData.manual = stepModel.get( 'manual' );

              if ( stepModel.get( 'backToReview' ) && !stepModel.get( 'manual' )){
                action = '#step:payment';
              }
              Vent.trigger( 'manualCheckout', stepModel.get( 'manual' ));
              stepModel.storeAddress( formData ).finish( action );
            });
          } else {
            stepView.disableForm( $form, false );

            if ( stepModel.get( 'backToReview' ) && !stepModel.get( 'manual' )){
              action = '#step:payment';
            }
            Vent.trigger( 'manualCheckout', stepModel.get( 'manual' ));
            stepModel.storeAddress( formData ).finish( action );
          }
        }
      }).on({
        'change' : function( ev ){
          var $form = $( ev.target ).closest( 'form' );
          var gotAll = true;

          $form.find( '[data-required-for-quote]:enabled,[data-send-for-quote]:enabled' ).each( function(){
            gotAll &= !!( this.value );
          });

          if ( gotAll ){
            var xhr = stepModel.get( 'xhr' );

            if ( xhr ){
              xhr.abort();
            }

            stepModel.set({
              synced : false
            });

            // visible form data
            var visibleFormData = $form.formObject()[ $form.attr( 'id' )];

            // hidden form object
            var hiddenFormObject = stepView.getManualCheckFormObject( visibleFormData );

            xhr = $.ajax({
              url    : hiddenFormObject.action,
              data   : hiddenFormObject.data,
              method : 'POST'
            }).done( function( dataObject ){
              if ( ! $.isPlainObject( dataObject )){
                //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
                console.warn( 'invalid response' );
                //>>excludeEnd( 'consoleLogExclude' );

                stepModel.set({
                  manual : true,
                  synced : true
                });
                return false;
              }

              //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
              console.log( dataObject );
              //>>excludeEnd( 'consoleLogExclude' );

              Vent.trigger( 'cartTotalsUpdate', dataObject.data.cart ? dataObject.data.cart : false );
              stepModel.set({
                manual : dataObject.data ? dataObject.data.manual : true,
                synced : true
              });
            }).fail( function( xhr ){
              if ( xhr.status !== 0 ){
                //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
                console.warn( 'failed response' );
                //>>excludeEnd( 'consoleLogExclude' );

                stepModel.set({
                  manual : true,
                  synced : true
                });
              }
            });

            stepModel.set({
              xhr : xhr
            });
          }

        }
      }, '[data-required-for-quote],[data-send-for-quote]' ).on({
        // toggle submit-button label, depending on the checkbox state
        'change' : function(){
          var checked = !!this.checked;

          if ( ! stepView.$submitButton || ! stepView.$submitButton.length ){
            stepView.$submitButton = stepView.$el.find( '[type="submit"]' );
          }

          stepView.$submitButton.each( function(){
            var $this = $( this );
            var routing = $this.data( 'labels' );

            if ( ! routing ){
              return true;
            }

            $this.val( routing[ checked.toString()]);
          });
        }
      }, '.submit-button-routing-trigger' ).on({
        'change blur keyup' : function( ev ){
          var $fieldsToDisplay = stepView.$el.find( '[data-bound-to="' + ev.target.id + '"]' );

          var $filteredFieldsToDisplay = $fieldsToDisplay.filter( '[data-bound-to-value="' + ev.target.value + '"]' );

          if ( $filteredFieldsToDisplay.length ){
            $fieldsToDisplay
              .not( $filteredFieldsToDisplay )
                .addClass( 'hidden' )
                .find( ':input' )
                  .attr( 'tabindex', -1 )
                  .prop( 'disabled', true );

            $filteredFieldsToDisplay
              .removeClass( 'hidden' )
              .find( ':input' )
                .prop( 'tabindex', false )
                .prop( 'disabled', false );
          } else {
            $fieldsToDisplay.not( ':first-child' )
              .not( $filteredFieldsToDisplay )
                .addClass( 'hidden' )
                .find( ':input' )
                  .attr( 'tabindex', -1 )
                  .prop( 'disabled', true );

            $fieldsToDisplay
              .first()
              .removeClass( 'hidden' )
              .find( ':input' )
                .prop( 'tabindex', false )
                .prop( 'disabled', false );
          }

          var $postalField = stepView.$el.find( '[name="postal"]' );

          if ( $postalField.length >= 1 ) {
            var $isZipCodeMandatory = $( ev.target ).find( 'option[data-postalcode-mandatory]:selected' );

            if ( $isZipCodeMandatory.length >= 1 ) {
              $postalField.attr( 'required', 'required' );
            } else {
              $postalField.removeAttr( 'required' );
              $postalField.clearField();
            }

            var $postalFieldLabel = stepView.$el.find( 'label[for="shipping-postal"]:not([class])' );
            if ( $postalFieldLabel.length >= 1 ) {
              var $text = $postalFieldLabel.text();
              if ( $isZipCodeMandatory.length >= 1 ) {
                if ($text.substr( -2 ) !== ' *') {
                  $postalFieldLabel.text( $text + ' *' );
                }
              } else {
                if($text.substr( -2 ) === ' *') {
                  $postalFieldLabel.text( $text.substr( 0, $text.length - 2) );
                }
              }
            }
          }
        }
      }, '[name="country"]' );

      this.model.on( 'change:active', this.render, this );
      this.model.on( 'change:backToReview', this.adjustRouting, this );
      this.model.on( 'done', this.resetRouting, this );
    },

    getManualCheckFormObject : function( formData ){
      var $form = $( '#checkout-information-form' );

      $form.find( 'input[name][data-mapping]' ).each( function(){
        var $this = $( this );
        $this.val( formData[ $this.data( 'mapping' )]);
      });

      return {
        action : $form.attr( 'action' ),
        data   : $form.serialize()
      };
    },

    disableForm : function( $form, bool ){
      $form.find( 'input[type="submit"],button[type="submit"]' )
        .toggleClass( 'processing', bool )
        .prop( 'disabled', bool );

      $form.find( ':input' )
        .prop( 'readonly', bool );

      return this;
    },

    render : function(){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cAddressShippingView%c➨%c render',
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        ''
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var addressData = this.model.get( 'addressData' );
      var triggerCheck = false;

      this.checkoutStepRender();

      // let's cache the $form selector
      if ( ! this.$form || ! this.$form.length ){
        this.$form = this.$( '#shipping-address-form' );
        triggerCheck = true;
      }

      // the model is inactive, so we don't need to do squat ;-)
      if ( ! this.model.active()){
        return this;
      }

      // let's invalidate the address check - just in case
      this.model.set({
        synced : false
      });

      // let's restore the form data
      if ( addressData ){
        this.$form.find( '[data-send-for-quote]:disabled' ).prop( 'disabled', false );
        this.$form.formObject( addressData, ':enabled' );
        this.$form.find( '[name="country"]:visible' ).trigger( 'change' );
        triggerCheck = false;
      }

      if ( triggerCheck ){
        this.$form.find( '[name="country"]' ).trigger( 'change' );
      }

      var tcData = {
        'page_cat1' : 'address.shipping-billing'
      };

      if ( this.model.get( 'backToReview' )){
        tcData[ 'change.shipping' ] = true;
      }

      DC.event( 'pageView', 'checkoutShippingBilling' );
      TC.event( 'tc_events_1', '14', tcData );

      return this;
    }
  });
});
