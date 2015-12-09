import $ from 'jquery';

'use strict';


$(document).on('click', '.button--disabled', function (event) {
    event.preventDefault();
});