import $ from 'jquery';
import { scrollTo } from '../common/helpers';

'use strict';


$(document).ready(function () {

    var $buttons = $('.js-scroll-button');

    $buttons.each(function () {
        var $button, $target, $scollable;

        $button = $(this);
        $target = $('#' + $button.data('scroll-target'));

        $button.click(function () {
            scrollTo($target);
        });
    });

});