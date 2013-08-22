/*global
  define: false,
  console: false
*/
define([
  'jquery',

  'tracking/double-click',
  'tracking/tag-commander',

  'checkout/views/checkout-step-view'
], function( $, DC, TC, CheckoutStepView ){
  'use strict';

  return CheckoutStepView.extend({
    templateID    : 'checkout-step-billing-address-template',
    defaultAction : '#step:payment',
    initialize    : function(){

      var stepView  = this;
      var stepModel = this.model;

      this.$el.formValidate().on({
        'submit' : function( ev ){
          ev.preventDefault();

          var $form = $( ev.target );
          var formData = $form.formObject()[ $form.attr( 'id' )];

          formData.countryFull = $form.find( '[name="country"] option:selected' ).text();

          var regionField = $form.find('[name="region"]:visible');
          formData.regionFull = (regionField.is('select')) ? regionField.find('option:selected').text() : regionField.val();

          stepModel.storeAddress( formData ).finish( $form.attr( 'action' ));
        }
      }).on({
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

            var $postalFieldLabel = stepView.$el.find( 'label[for="billing-postal"]:not([class])' );
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

    render : function(){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cAddressBillingView%c➨%c render',
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        ''
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var addressData = this.model.get( 'addressData' );

      this.checkoutStepRender();

      // let's cache the $form selector
      if ( ! this.$form || ! this.$form.length ){
        this.$form = this.$( '#billing-address-form' );
        this.$form.find( '[name="country"]' ).trigger( 'change' );
      }

      // the model is inactive, so we don't need to do squat ;-)
      if ( ! this.model.active()){
        return this;
      }

      // let's restore the form data
      if ( addressData ){
        this.$form.formObject( addressData );
        this.$form.find( '[name="country"]' ).trigger( 'change' );
      }

      var tcData = {
        'page_cat1' : 'address.billing'
      };

      if ( this.model.get( 'backToReview' )){
        tcData[ 'change.billing' ] = true;
      }

      DC.event( 'pageView', 'checkoutBilling' );
      TC.event( 'tc_events_1', '15', tcData );

      return this;
    }
  });
});
