/*global
  define: false
*/
define([ 'jquery' ], function ( $ ) {
  'use strict';

  $.fn.formObject = function ( data, filter ) {
    if ( data ) {
      this.each( function () {
        // we do it only for forms
        if ( ! /form/i.test( this.tagName ) ) {
          return false;
        }

        var $form = $( this );
        var $inputs = $form.find( ':input' );

        if ( filter ) {
          $inputs = $inputs.filter( filter );
        }

        // unserialize
        $.each( data, function ( key, value ) {
          $inputs
            .filter( '[name=' + key + ']' )
              .each( function( index, input ){
                var $input = $( input );

                if ( /radio|checkbox/i.test( input.type ) ) {
                  // set them only if they have matching value or no value set at all
                  if ( ( $input.prop( 'value' ) && input.value === value ) || ! $input.prop( 'value' ) ) {
                    $input.prop( 'checked', true );
                  }
                } else {
                  $input.val( value );
                }
              });
        });
      });
    } else {
      var formsData = {};

      this.each( function () {
        var returnObj = {};

        // based on http://jsfiddle.net/sxGtM/3/

        $.each( $( this ).serializeArray(), function () {
          if ( returnObj[ this.name ] !== undefined ){
            if ( !returnObj[ this.name ].push ){
              returnObj[ this.name ] = [ returnObj[ this.name ]];
            }
            returnObj[ this.name ].push( this.value || '' );
          } else {
            returnObj[ this.name ] = this.value || '';
          }
        });

        // // we store the values
        formsData[ this.id ] = returnObj;
        return returnObj;
      });

      return formsData;
    }
  };
});
