import $ from 'jquery';

'use strict';


$(document).ready(function () {
    $('.faq-switches').each(function () {
        var $switches = $(this).find('.faq__switch');

        $switches.click(function () {
            $switches.removeClass('faq__switch--initial faq__switch--active');
            $(this).addClass('faq__switch--active');
        });
    });
});