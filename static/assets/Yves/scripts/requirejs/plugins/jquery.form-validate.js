/*global
  define: false
*/
define([ 'jquery' ], function( $ ){
  'use strict';

  var defaultOptions = {
    inputSelector : ':input[required]:not(:disabled),:input[pattern]:not(:disabled)',
    labelClass    : 'label-error',
    errorLabel    : 'this field is corrupted'
  };

  // var validationTimeout;

  function labelSelector( options ){
    return 'label.' + options.labelClass.replace( /\s+/g, '.' );
  }

  function renderErrorLabel( forId, message, cssClass ){
    return '<label class="' + cssClass + '" for="' + forId + '">' + message + '</label>';
  }

  function luhnCheck( a, b, c, d, e ){
    a = ( a .toString() || '' ).replace( /[^0-9]/g, '' );

    if ( ! a || !a.length ){
      return false;
    }

    for (d = +a[ b = a.length - 1 ], e = 0; b-- ; ) {
      c = +a[b];
      d += ++e % 2 ? 2 * c % 10 + ( c > 4 ) : c;
    }

    return ( d % 10 === 0 );
  }

  function validateInput( ev, form, input, options, focus ){
    var valid  = true;
    var $form  = $( form );
    var $input = $( input );

    var pattern  = $input.attr( 'pattern' );
    var required = $input.attr( 'required' );
    var value    = $input.val();

    $form.find( labelSelector( options ) + '[for="' + input.id + '"]' ).remove();

    if ( ev.type === 'keyup' && ev.keyCode === 9 ){
      return ev;
    }

    if ( required ){
      if ( $input.data( 'type' ) === 'creditcard' ){

        var ccNumber = ( value || '' ).toString().replace( /[^\d]/g, '' );
        var luhnValid = luhnCheck( ccNumber );

        if ( $input.data( 'validate' ) === 'hard' ){
          if ( ! luhnValid ){
            valid = false;
            $input.addErrorLabel( $form, options, 'luhn', focus );
          }
          return valid;

          // console.log( 'failed on luhn', ccNumber );
        }
        $input.trigger( 'luhnValidate', luhnValid );
      }

      if ( /checkbox|radio/i.test( input.type )){
        if ( ! input.checked ) {
          var sameGroupCheckedCount = $form
                                        .find( '[name=' + input.name +']' )
                                          .filter( ':checkbox:checked,:radio:checked' )
                                            .length;

          if ( ! sameGroupCheckedCount ){
            valid = false;
            $input.addErrorLabel( $form, options, false, focus );
          }
        }

        return valid;
      }

      if ( ! value ){
        valid = false;
        $input.addErrorLabel( $form, options, false, focus );
        return valid;
      }
    }

    if ( pattern ){
      var trimmedValue = '';

      if ( $input.data( 'type' ) === 'creditcard' ){
        trimmedValue = ( value || '' ).toString().replace( /[^\d]/g, '' );
      }

      if ( ! new RegExp( pattern ).test( trimmedValue || value )){
        valid = false;
        $input.addErrorLabel( $form, options, 'pattern', focus );

        // console.log( 'failed on pattern' );

        return valid;
      }
    }

    var minLength = parseInt( $input.data( 'min-length' ), 10 );
    if ( minLength && input.value.length < minLength ){

      valid = false;
      $input.addErrorLabel( $form, options, 'min-length', focus );

      // console.log( 'failed on min-length' );

      return valid;
    }

    return valid;
  }

  function styleInput( input, valid ){
    if ( typeof valid !== 'boolean' ){
      return false;
    }

    $( input ).toggleClass( 'valid', !!valid ).toggleClass( 'invalid', !valid );
  }

  function validateFormHandler( ev, form, options ){
    var valid = true;
    var $form = $( form );

    $form.find( labelSelector( options )).remove();
    $form.find( options.inputSelector ).each( function( index, input ){
      var inputValid = validateInput( ev, form, input, options, valid );

      valid &= inputValid;

      styleInput( input, valid );

      return valid;
    });

    if ( !valid ){
      ev.preventDefault();
      ev.stopImmediatePropagation();
    }

    return valid;
  }

  $.fn.addErrorLabel = function( form, userOptions, errorType, focus ){
    var $lastInput = this.parent().find( ':input' ).last();

    var options = $.extend( {}, defaultOptions, userOptions );
    // var options = userOptions;

    var errorLabel;

    if ( errorType ) {
      errorLabel = this.data( 'error-' + errorType + '-label' ) ||
                     form.data( 'error-' + errorType +  '-label' );
    }

    var $errorLabel = renderErrorLabel(
      this.attr( 'id' ),
      errorLabel ||
        this.data( 'error-label' ) ||
        form.data( 'error-label' ) ||
        options.errorLabel,
      options.labelClass
    );

    if ( options.injectInto ){
      options.injectInto.append( $errorLabel );
    } else {
      ( options.injectAfter || $lastInput ).after( $errorLabel );
    }

    if ( focus ){
      this.focus();
    }

    return this;
  };

  $.fn.formValidate = function( userOptions ){
    var options = $.extend( {}, defaultOptions, userOptions );
    this.filter( 'form' ).attr( 'novalidate', 'novalidate' ).prop( 'novalidate', true );
    this.find( 'form' ).attr( 'novalidate', 'novalidate' ).prop( 'novalidate', true );

    this.on({
      'submit.validator' : function( ev ){
        return validateFormHandler( ev, ev.target, options );
      }
    }, '[data-js-validate]' ).on({
      'change.validator blur.validator, no-keyup.validator' : function( ev ){
        var form = $( ev.target ).parentsUntil( 'form' ).last().parent().get( 0 );
        var valid = validateInput( ev, form, ev.target, options, false );

        styleInput( ev.target, valid );
      },

      'focus.validator' : function( ev ){
        $( ev.target ).removeClass( 'invalid' );
      }
    }, '[required],[pattern]' ).filter( '[data-js-validate]' ).on({
      'submit.validator' : function( ev ){
        return validateFormHandler( ev, ev.target, options );
      }
    });

    return this;
  };

  $.fn.clearField = function( userOptions ){
    var options = $.extend( {}, defaultOptions, userOptions );

    var $form = $( this ).parentsUntil( 'form' ).last();
    $form.find( labelSelector( options ) + '[for="' + this.attr('id') + '"]' ).remove();
    $( this ).removeClass( 'valid' ).removeClass( 'invalid' );

    return this;
  };

  // $.fn.formValidate.defaultOptions = defaultOptions;
});
