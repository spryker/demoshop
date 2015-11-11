import $ from 'jquery';

'use strict';


const EVENTS = {
    OFFCANVAS_SHOW: 'OFFCANVAS_SHOW'
}


$(document).ready(function () {

    var $offcanvas, $accordeons;

    $offcanvas = $('.offcanvas');
    $accordeons = $offcanvas.find('.offcanvas__accordeon');

    $(document).on(EVENTS.OFFCANVAS_SHOW, show);

    $offcanvas.find('.close-button').click(hide);

    $offcanvas.click(function (e) {
        var $target = $(e.target);

        if (!$target.parents('.offcanvas__inner').size() && !$target.hasClass('offcanvas__inner')) {
            hide();
        }
    });

    $accordeons.each(function () {
        var $accordeon = $(this);

        $accordeon.find('.offcanvas__category').click(function () {
            $accordeon.find('.offcanvas__items').slideToggle();
        });
    });



    function show () {
        $offcanvas.addClass('offcanvas--open');
    }

    function hide () {
        $offcanvas.removeClass('offcanvas--open');
    }

});


export { EVENTS };