'use strict';

var $ = require('jquery'),
    overlay = require('./overlay'),
    mode = 'login';

var showLoginForm = function() {
  $('.overlay').addClass('overlay--login');
  overlay.show();
};

var toggleMode = function(e) {
  e.preventDefault();
  if (mode === 'login') {
    $('.js-login-form').addClass('login-form--register');
    $('.js-login-form-switch').html('Ich habe bereits ein Konto');
    $('.js-login-submit').val('Registrieren');
    mode = 'register';
  } else {
    $('.login-form').removeClass('login-form--register');
    $('.js-login-form-switch').html('Ich bin Neukunde');
    $('.js-login-submit').val('Anmelden');
    mode = 'login';
  }
};

module.exports = {

  init: function() {
    $('.js-show-login-button').click(showLoginForm);
    $('.js-login-form-switch').click(toggleMode);
  }
};
