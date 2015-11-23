import $ from 'jquery';

'use strict';


// event declarations
const EVENTS = {
    DISABLE_SCROLLING: 'DISABLE_SCROLLING',
    ENABLE_SCROLLING: 'ENABLE_SCROLLING'
};


$(document).ready(function () {

    // cached dom references
    var $body = $('body');

    // disable scrolling on body
    $(document).bind(EVENTS.DISABLE_SCROLLING, function () {
        $body.addClass('no-scrolling');
    });

    // enable scrolling on body
    $(document).bind(EVENTS.ENABLE_SCROLLING, function () {
        $body.removeClass('no-scrolling');
    });

});


// publications
export { EVENTS };