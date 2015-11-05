import $ from 'jquery';

'use strict';


$(document).ready(function () {
    $('.product-gallery').each(function () {
        var $gallery, $thumbs, $image;

        $gallery = $(this);
        $thumbs = $gallery.find('.product-gallery__thumbnail img');
        $image = $gallery.find('.product-gallery__image img');

        $thumbs.click(function () {
            var $thumb = $(this);

            $image.attr('src', $thumb.data('src'));
            $image.attr('alt', $thumb.data('alt'));
        });
    })
});