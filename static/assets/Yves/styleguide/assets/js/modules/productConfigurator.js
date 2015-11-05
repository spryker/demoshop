import $ from 'jquery';

'use strict';


$(document).ready(function () {

    var $trigger = $('.product__customize');

    $trigger.click(function () {
        alert('show configurator');
    });
});