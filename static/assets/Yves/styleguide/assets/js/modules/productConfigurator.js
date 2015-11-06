import $ from 'jquery';

'use strict';


$(document).ready(function () {

    var $trigger = $('.js-product-customize');

    $trigger.click(function () {
        alert('show configurator');
    });
});