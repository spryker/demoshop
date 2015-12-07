import $ from 'jquery';

import { getViewport, prefixCss, getFormData } from '../../common/helpers';
import { MessageService } from '../../common/messages';

'use strict';


$(document).ready(function () {

    $('.js-login-slider').each(function () {
        var $slider, $navigationContainer, $navigations, $contentContainer, $contents;

        $slider = $(this);

        $navigationContainer = $slider.find('.login-slider__navigations .login-slider__inner');
        $navigations = $navigationContainer.find('.login-slider__navigation');

        $contentContainer = $slider.find('.login-slider__contents .login-slider__inner');
        $contents = $contentContainer.find('.login-slider__content');

        $contentContainer.css({'width': 100 * $contents.size() + '%'});
        $contents.css({'width': 100 / $contents.size() + '%'});

        var index = 0;


        updateOffset();

        setTimeout(function () {
            $navigations.css('opacity', 1);
        }, 100);

        $(window).resize(function () {
            updateOffset();
        });

        $navigations.click(function () {
            index = $navigations.index($(this));
            updateSlider();
        });


        function updateSlider () {
            var $navigation = $navigations.eq(index);

            $navigations.removeClass('login-slider__navigation--active');
            $navigation.addClass('login-slider__navigation--active');

            var x = getViewport()[0] / 2 - $navigation.outerWidth() / 2 - parseInt($navigation.attr('data-offset'), 10);
            $navigationContainer.css(prefixCss({'transform': 'translate(' + x + 'px, 0)'}));

            $contentContainer.css(prefixCss({'transform': 'translate(' + (100 / $contents.size() * index * -1) + '%, 0)'}));
        }


        function updateOffset () {
            $slider.removeClass('js-animation');

            setTimeout(function () {
                $navigationContainer.css(prefixCss({'transform': 'translate(0, 0)'}));

                $navigations.each(function () {
                    $(this).attr('data-offset', Math.round($(this).offset().left));
                });

                updateSlider();

                setTimeout(function () {
                    $slider.addClass('js-animation');
                }, 100);
            });

        }
    });


    // $('.js-login-form').each(function () {
    //     var $form, messageService;
    //
    //     $form = $(this);
    //     messageService = new MessageService();
    //
    //     $form.submit(function (event) {
    //         event.preventDefault();
    //
    //         $.ajax({
    //             url: $(this).attr('action'),
    //             method: 'POST',
    //             data: getFormData($form),
    //             dataType: 'json'
    //
    //         }).done(function (data) {
    //             if (data.isSuccess === false) {
    //                 messageService.add({ type: 'invalid', message: data.message });
    //             } else {
    //                 messageService.add({ type: 'valid', message: data.message });
    //             }
    //
    //         });
    //
    //     });
    // });

});
