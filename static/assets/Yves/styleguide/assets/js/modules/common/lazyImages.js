import $ from 'jquery';
import { getViewport } from './helpers';
import throttle from 'lodash/function/throttle';


$(document).ready(function () {

    var $images, checkImages;

    $images = $('.js-lazy-image');

    checkImages = throttle(function () {

        var scrollTop, viewportHeight;

        scrollTop = $(window).scrollTop();
        viewportHeight = getViewport()[1];

        $images.each(function () {
            var $image = $(this);

            if ($image.offset().top > scrollTop - viewportHeight && $image.offset().top < scrollTop + viewportHeight) {

                var src, image;

                src = $image.data('image-src');
                image = new Image();

                image.onload = function () {
                    $image.attr('src', src);

                    setTimeout(function () {
                        $image.removeClass('js-lazy-image');
                    }, 100);
                };

                image.onerror = function () {
                    $image.remove();
                };

                image.src = src;
            }
        });


        $images = $('.js-lazy-image');

        if (!$images.size()) {
            $(window).unbind('scroll', checkImages);
            $(window).unbind('resize', checkImages);
        }

    }, 250);


    $(window).bind('scroll', checkImages);
    $(window).bind('resize', checkImages);

    checkImages();

});
