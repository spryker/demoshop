import $ from 'jquery';

'use strict';


$(document).ready(function () {

    $('.password-input').each(function () {
        var $password, $toggle, $input;

        $password = $(this);
        $input = $password.find('input');
        $toggle = $password.find('.password-input__toggle');

        $toggle.click(function () {
            $input.attr('type', $input.attr('type') === 'password' ? 'text' : 'password');
        });
    });

});