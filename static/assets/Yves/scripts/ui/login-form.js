'use strict';

var $ = require('jquery'),
    overlay = require('./overlay'),
    mode = 'login',
    loggedIn = false;

var showLoginForm = function () {
    $('.overlay').addClass('overlay--login');
    overlay.show();
};

var closeLoginForm = function () {
    $('.overlay').removeClass('overlay--login');
    overlay.hide();
};

var toggleMode = function (e) {
    e.preventDefault();

    if (mode === 'login') {
        setRegisterUrl();
        $('.js-login-form').addClass('login-form--register');
        $('.js-login-form-switch').html('Ich habe bereits ein Konto');
        $('.js-login-submit').val('Registrieren');
        mode = 'register';
    } else {
        setLoginUrl();
        $('.login-form').removeClass('login-form--register');
        $('.js-login-form-switch').html('Ich bin Neukunde');
        $('.js-login-submit').val('Anmelden');
        mode = 'login';
    }
};

var toggleLoggedInState = function () {
    loggedIn = !loggedIn;
    //TODO: load the html for the user menu with another ajax call
    if (loggedIn) {
        $('.js-show-login-button').off('click', showLoginForm);
        $('.user__login').html('Benutzerkonto').removeClass('js-show-login-button');
    } else {
        $('.user__login').html('Anmelden').addClass('js-show-login-button');
        $('.js-show-login-button').on('click', showLoginForm);
    }
}

var setLoginUrl = function() {
    var $loginForm = $('.js-login-form');
    $loginForm.attr('action', $loginForm.attr('data-login-url'));
};

var setRegisterUrl = function() {
    var $loginForm = $('.js-login-form');
    $loginForm.attr('action', $loginForm.attr('data-register-url'));
};

var showUserError = function (errorMessage) {
    $('.errorDisplay').html(errorMessage);
};

var handleOverlayResponse = function (response) {
    if (response && response.success) {
        closeLoginForm();
    }
    handleLoginResponse(response);
};

var handleCheckoutResponse = function (response) {
    if (response && response.success) {
        $('.js-checkout-address').removeClass('js-checkout-collapsed');
        $('.js-checkout-login').addClass('js-checkout-collapsed');
    }
    handleLoginResponse(response);
};
var handleLoginResponse = function (response) {
    console.log(response);
    if (response && response.success) {
        toggleLoggedInState();
    } else {
        showUserError(response.message);
    }
};

var postForm = function (e) {
    e.preventDefault();

    var $form = $(e.target);
    var actionUrl = $form.attr('action');
    var formData = $form.serialize();

    $.ajax({
        type: "POST",
        url: actionUrl,
        data: formData
    }).done(function(response){
        if ('overlay' == e.currentTarget.parentElement.className){
            handleOverlayResponse(response);
        } else {
            handleCheckoutResponse(response);
        }
    }).error(function(error){
        console.log(error);
    });
};

module.exports = {

    init: function () {
        setLoginUrl();

        $('.js-show-login-button').on('click', showLoginForm);
        $('.js-login-form-switch').on('click', toggleMode);

        $('.js-login-form').submit(postForm);
    }
};
