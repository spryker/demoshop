'use strict';

var $ = require('jquery');

var $nameInput,
    $emailInput,
    $addressInput,
    $addressCheckbox,
    $deliveryAddressInput,
    $addressButton,
    $paymentButton,
    $addressElements,
    $shoppingCart,
    $addressValidationResult;

var initValidation = function() {
  $nameInput = $('.js-checkout-name');
  $emailInput = $('.js-checkout-email');
  $addressInput = $('.js-invoice-address');
  $addressCheckbox = $('.js-delivery-address-checkbox');
  $deliveryAddressInput = $('.js-delivery-address');
  $addressButton = $('.js-address-button');
  $('.js-checkout-address input, .js-checkout-address textarea').keyup(validateAddressBlock);
  $addressCheckbox.click(validateAddressBlock);
};

var validateAddressBlock = function() {
  $addressElements = $('#checkout_billing_address').children();

  if($($addressCheckbox).is(':checked')){
    $.merge( $addressElements, $('#checkout_shipping_address').children() );
  }

  $addressValidationResult = 1;
  $addressElements.each(function($id, $element){
        $addressValidationResult = $addressValidationResult && $($element).val().length;
      }
  );

  if($addressValidationResult){
    $addressButton.attr('disabled', false);
  } else {
    $addressButton.attr('disabled', true);
  }
};

function postForm($form, callback){
  /*
   * Get all form values
   */
  var values = {};
  $.each( $form.serializeArray(), function(i, field) {
    values[field.name] = field.value;
  });

  /*
   * Throw the form values to the server!
   */
  $.ajax({
    type : $form.attr('method'),
    url : $form.attr('action'),
    data : values,
    success : function(data) {
      callback(data);
    }
  });
}

module.exports = {

  init: function() {
    $('.login__skip').click(function() {
      $('.js-checkout-address').removeClass('js-checkout-collapsed');
      $('.js-checkout-login').addClass('js-checkout-collapsed');

      // if logged in, prefill email and name
      //   if has address, prefill too
      //   else focus address
      // else focus email
      $('.js-checkout-email').focus();
    });

    $('.js-address-button').click(function(event) {
      event.preventDefault();
      $('.js-checkout-address').addClass('js-checkout-collapsed js-checkout-completed');
      $('.js-checkout-payment').removeClass('js-checkout-collapsed');
    });

    $('.js-payment-button').click(function(event) {
      event.preventDefault();
      $('.js-checkout-payment').addClass('js-checkout-collapsed js-checkout-completed');
      $('.js-checkout-confirm').removeClass('js-checkout-collapsed');
      $('.js-checkout-cart').hide();
    });

    $('.js-edit-formblock').click(function(event) {
      event.preventDefault();
      $('.js-form-block').addClass('js-checkout-collapsed');
      $(event.currentTarget).parents('.js-form-block').removeClass('js-checkout-collapsed');
      $('.js-checkout-cart').show();
    });

    $('.js-confirm-agb').click(function(event) {
      event.preventDefault();
      if ($(event.currentTarget).prop('checked')) {
        $('.js-checkout-submit').attr('disabled', false)
      } else {
        $('.js-checkout-submit').attr('disabled', true)
      }
    });

    $(document).ready(function(){
      $('[ name="checkout"]').submit(function(e){
        e.preventDefault();

        postForm($(this), function(response){
          console.log(response);

          if(response.succes){
            window.location = response.url;
          } else {
            //alert('Ihre Bestellung konnte nicht gespeichert werden. Bitte beachten Sie die Hinweise am Seitenanfang.');
            $('#backend-errors').empty();

            $.each( response.errors, function( index, value ){
              $('#backend-errors').append( '<div>Fehler '+ value.errorCode + ': ' + value.message + '</div>' );
            });

            $('#backend-errors-section').show();
            $("html, body").animate({ scrollTop: 0 }, "slow");
          }
        });

        if(window.location.pathname.match(/^\/checkout/)) {
            $shoppingCart.hide();
        }

        initValidation();
    }
};
