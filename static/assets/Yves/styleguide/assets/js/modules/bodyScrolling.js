import $ from 'jquery';

'use strict';


$(document).ready(function () {

    var $body = $('body');

    $(document).bind('DISABLE_SCROLLING', function () {
        $body.addClass('no-scrolling');
    });

    $(document).bind('ENABLE_SCROLLING', function () {
        $body.removeClass('no-scrolling');
    });

});