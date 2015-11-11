import $ from 'jquery';

'use strict';


const EVENTS = {
    DISABLE_SCROLLING: 'DISABLE_SCROLLING',
    ENABLE_SCROLLING: 'ENABLE_SCROLLING'
};


$(document).ready(function () {

    var $body = $('body');

    $(document).bind(EVENTS.DISABLE_SCROLLING, function () {
        $body.addClass('no-scrolling');
    });

    $(document).bind(EVENTS.ENABLE_SCROLLING, function () {
        $body.removeClass('no-scrolling');
    });

});


export { EVENTS };