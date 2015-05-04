'use strict';

var $ = require('jquery');

var $nameInput,
    $emailInput,
    $addressInput,
    $addressCheckbox,
    $deliveryAddressInput,
    $addressButton;

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
  if ($nameInput.val().length
    && $emailInput.val().length
    && $addressInput.val().length
    && (!$addressCheckbox.prop('checked') || $deliveryAddressInput.val().length)) {
    $addressButton.attr('disabled', false);
  } else {
    $addressButton.attr('disabled', true);
  }
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

    $('.js-delivery-address-checkbox').click(function() {
      if ($('.js-delivery-address-checkbox:checked').length) {
        $('.js-delivery-address').show(300);
        $('.js-invoice-address').attr('placeholder', 'Rechnungsadresse');
      } else {
        $('.js-delivery-address').hide(300);
        $('.js-invoice-address').attr('placeholder', 'Rechnungs- und Lieferadresse');
      }
    });

    $('.js-address-button').click(function() {
      $('.js-checkout-address').addClass('js-checkout-collapsed js-checkout-completed');
      $('.js-checkout-payment').removeClass('js-checkout-collapsed');
    });

    $('.js-payment-button').click(function() {
      $('.js-checkout-payment').addClass('js-checkout-collapsed js-checkout-completed');
      $('.js-checkout-confirm').removeClass('js-checkout-collapsed');
      $('.js-checkout-cart').hide();
    });

    $('.js-edit-formblock').click(function(e) {
      $('.js-form-block').addClass('js-checkout-collapsed');
      $(e.currentTarget).parents('.js-form-block').removeClass('js-checkout-collapsed');
      $('.js-checkout-cart').show();
    });

    $('.js-confirm-agb').click(function(e) {
      if ($(e.currentTarget).prop('checked')) {
        $('.js-checkout-submit').attr('disabled', false)
      } else {
        $('.js-checkout-submit').attr('disabled', true)
      }
    });

    initValidation();
  }
};