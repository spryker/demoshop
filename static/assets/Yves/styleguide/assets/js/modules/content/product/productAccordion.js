import $ from 'jquery';

'use strict';


$(document).ready(function () {

    $('.product-accordion').each(function () {

        var $accordion, $items;

        $accordion = $(this);
        $items = $accordion.find('.product-accordion-item');

        $items.filter('.product-accordion-item--active').find('.product-accordion-item__content').show();

        $items.each(function () {
            var $item, $header;

            $item = $(this);
            $header = $item.find('.product-accordion-item__header');

            $header.click(function () {
                var $content = $item.find('.product-accordion-item__content');

                if (!$item.hasClass('product-accordion-item--active')) {
                    var $active = $items.filter('.product-accordion-item--active');
                    $active.removeClass('product-accordion-item--active');
                    $active.find('.product-accordion-item__content').slideUp();

                    $item.addClass('product-accordion-item--active');
                    $content.slideDown();

                } else {
                    $item.removeClass('product-accordion-item--active');
                    $content.slideUp();
                }
            });
        });
    });

});