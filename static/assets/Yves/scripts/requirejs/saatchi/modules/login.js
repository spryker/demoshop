/*global
  define: false,
  window: false
*/
define([
  'jquery',

  'plugins/jquery.form-validate',
  'plugins/jquery.form-object'
], function ( $ ){
  'use strict';

  function disableForm( $form, bool ) {
    $form.find( 'input[type="submit"],button[type="submit"]' )
      .toggleClass( 'processing', bool )
      .prop( 'disabled', bool );

    $form.find( ':input' )
      .prop( 'readonly', bool );

    return $form;
  }

  return {
    init : function () {
      $( '#input-password-login' ).on({
        focus: function () {
          // if someone clicks in the password box, make sure the radio buttons
          // are correct
          $( '#input-context-login' ).prop('checked', true);
        }
      });

      $( '.input-field#mail' ).focus();

      var $form = $( '#login-form' ).formValidate({
        inputSelector : ':input[required]:visible,:input[pattern]:visible'
      }).on({
        change : function ( ev ) {
          var $togglerContainer  = $( ev.target ).parentsUntil( '.togglers-container' ).last();
          var $togglersContainer = $togglerContainer.parent();

          var $toggables = $togglersContainer.find( '.toggable' );

          var $toggablesToBeVisible = $togglerContainer.nextUntil( '.toggler-container' );
          var $toggablesToBeHidden  = $toggables.not( $toggablesToBeVisible ).not( '.hidden' );

          $toggablesToBeVisible = $toggablesToBeVisible.filter( '.hidden' );

          $toggablesToBeHidden.addClass( 'hidden' );
          $toggablesToBeVisible.removeClass( 'hidden' ); //.find( 'input' ).first().focus();

          // switching labels and texts
          var context = $( ev.target ).attr( 'id' );
          var $mailField = $( '#mail' );

          var needle = 'login';

          if ( context === 'input-context-register' ) {
            needle = 'register';
            var pattern = $mailField.data( 'pattern' );
            $mailField.attr( 'pattern', pattern );
          } else {
            $mailField.removeAttr( 'pattern' );
          }

          var $emailBlockSelector = $( '.login-register-container .email-container' );
          var $allLabels          = $emailBlockSelector.find( '.login, .register' );
          var $labelsToShow       = $emailBlockSelector.find( '.' + needle ).removeClass( 'hidden' );
          $allLabels.not( $labelsToShow ).addClass( 'hidden' );
        }
      }, '.toggler input[type=radio]' )
        .on({
          click: function ( ev ) {
            ev.preventDefault();

            var w = 600;
            var h = 300;

            var leftPosition = ( window.screen.width / 2  ) - ( ( w / 2 ) + 10 );
            var topPosition  = ( window.screen.height / 2 ) - ( ( h / 2 ) + 50 );
            var href = $( ev.target ).attr( 'href' );

            var facebookLogin = window.open( href, 'facebook login', [
              'width=' + w,
              'height=' + h,
              'status=0',
              'scrollbars=0',
              'resizable=0',
              'left=' + leftPosition,
              'top=' + topPosition,
              'screenX=' + leftPosition,
              'screenY=' + topPosition
            ].join( ',' ) );

            var currentWindow = window;

            facebookLogin.opener = window;

            facebookLogin.onclose = function () {
              currentWindow.location.reload();
            };
            facebookLogin.focus();
          }
        }, '.facebook-button' )
        .on({
          'submit': function ( ev ) {
            disableForm( $( ev.target ), true );
          }
        });

      $form
        .find( '.toggler input[type=radio]:checked' )
        .first()
          .trigger( 'change' );
    }
  };
});
