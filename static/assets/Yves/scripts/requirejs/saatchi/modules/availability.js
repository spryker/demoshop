/*global
  define: false
*/
define([
  'jqueryui',

  'plugins/jquery.form-validate',
  'plugins/jquery.form-object'
], function ( $ ) {
  'use strict';

  return {
    init : function () {
      var $form = $( '#availability-form' )
        .formValidate();

      $form.find( '[data-datepicker]' )
        .datepicker({
          // constrainInput : false,
          beforeShowDay : function ( date ) {
            var day = date.getDay();
            return [
              ! ( !day || day === 6 ),
              '',
              null
            ];
          },
          minDate : 2
        });

      var $timeSelectBoxFrom = $( '#pickup-time' );
      var $timeSelectBoxTo   = $( '#pickup-time2' );

      $timeSelectBoxFrom.on({
        'change' : function ( ev ) {
          $timeSelectBoxTo
            .find( 'option[value="' + ev.target.value + '"]' )
            .prop( 'disabled', true )
            .nextAll()
              .prop( 'disabled', false )
              .end()
            .prevAll()
              .prop( 'disabled', true );

          if ( $timeSelectBoxTo.find( 'option:disabled:selected' ).length ) {
            $timeSelectBoxTo
              .find( 'option' )
              .not( ':disabled' )
              .first()
                .prop( 'selected', true );
          }
        }
      }).trigger( 'change' );

      $form.on({
        'change blur keyup' : function ( ev ) {

          var checked = ev.target.checked && ( + ev.target.value );

          var $inputs = $form.find( '[data-bound-by="' + ev.target.name + '"]' )
            .toggleClass( 'hidden', ! checked )
            .find( ':input' )
              .prop( 'disabled', ! checked );

          if ( checked ) {
            $inputs.prop( 'tabindex', false );
          } else {
            $inputs.attr( 'tabindex', -1 );
          }
        }
      }, '[name="artwork_availability"]' ).on({
        'change blur keyup' : function ( ev ) {

          var $fieldsToDisplay = $form.find( '[data-bound-by="' + ev.target.name + '"]' );
          var filterSelector = '[data-bound-by-value="' + ev.target.value + '"]';

          var $filteredFieldsToDisplay = $fieldsToDisplay.filter( filterSelector );

          if ( $filteredFieldsToDisplay.length ) {
            $fieldsToDisplay
              .not( $filteredFieldsToDisplay )
                .addClass( 'hidden' )
                .find( ':input' )
                .val( '' )
                  .attr( 'tabindex', -1 )
                  .prop( 'disabled', true );

            $filteredFieldsToDisplay
              .removeClass( 'hidden' )
              .find( ':input' )
                .prop( 'tabindex', false )
                .prop( 'disabled', false );
          } else {
            $fieldsToDisplay
              .not( $fieldsToDisplay.first() )
              .not( $filteredFieldsToDisplay )
                .addClass( 'hidden' )
                .find( ':input' )
                .val( '' )
                  .attr( 'tabindex', -1 )
                  .prop( 'disabled', true );

            $fieldsToDisplay
              .first()
              .removeClass( 'hidden' )
              .find( ':input' )
                .prop( 'tabindex', false )
                .prop( 'disabled', false );
          }

          var $postalField = $form.find( '[name="zip_code"]' );

          if ( $postalField.length >= 1 ) {
            var $isZipCodeMandatory = $( ev.target ).find( 'option[data-postalcode-mandatory]:selected' );

            if ( $isZipCodeMandatory.length >= 1 ) {
              $postalField.prop( 'required', true );
            } else {
              $postalField.prop( 'required', false );
              $postalField.clearField();
            }

            var $postalFieldLabel = $form.find( 'label[for="address-postal"]:not([class])' );
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
      }, '[name="iso2_country"]' )
        .find( '[data-trigger-on-load]' )
          .each( function () {
            var $el = $( this );
            $el.trigger( $el.data( 'trigger-on-load' ) );
          });
    }
  };
});
