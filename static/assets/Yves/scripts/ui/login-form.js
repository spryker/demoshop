'use strict';

var $ = require('jquery'),
    overlay = require('./overlay'),
    mode = 'login';

var showLoginForm = function () {
    $('.overlay').addClass('overlay--login');
    overlay.show();
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

var setLoginUrl = function() {
    var $loginForm = $('.js-login-form');
    $loginForm.attr('action', $loginForm.attr('data-login-url'));
};

var setRegisterUrl = function() {
    var $loginForm = $('.js-login-form');
    $loginForm.attr('action', $loginForm.attr('data-register-url'));
};

var handleResponse = function() {
    alert('Implement me yo')
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
    }).done(function(){
        handleResponse();
    }).error(function(error){
        console.log(error);
    });
};

module.exports = {

    init: function () {
        setLoginUrl();

        $('.js-show-login-button').click(showLoginForm);
        $('.js-login-form-switch').click(toggleMode);

        $('.js-login-form').submit(postForm);
    }
};
