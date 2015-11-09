import $ from 'jquery';
import { debounce, getViewport } from './helpers';

'use strict';


$(document).ready(function () {

    $('.product-slider__slider').each(function () {
        var $slider, $container, $prev, $next, $cards, $bullets, $productCard;

        $slider = $(this);
        $container = $slider.find('.product-slider__slider-inner');
        $prev = $slider.find('.product-slider__control--prev');
        $next = $slider.find('.product-slider__control--next');
        $productCard = $slider.find('.product-card');

        var index, count, visible;

        index = 1;

        updateVisible();
        count = $productCard.size();


        createBullets();


        $prev.click(previous);
        $next.click(next);

        $slider.on('click', '.product-slider__bullet', function () {
            index = $bullets.index($(this));
            slide();
        });



        $(window).resize(debounce(250, function () {
            updateVisible();
            createBullets();
            slide();
        }));



        function previous () {
            index = Math.max(0, index - 1);
            slide();
        }

        function next () {
            index = Math.min(count - visible, index + 1);
            slide();
        }



        function hasPrevious () {
            return index > 0;
        }

        function hasNext () {
            return index < count - visible;
        }



        function slide () {
            updateBullets();
            updateContainerOffset();
            updateControls();
        }


        function createBullets () {
            if (!!$bullets) {
                $bullets.remove();
            }

            $bullets = $slider.find('.product-slider__bullets');

            for (let i = 0; i <= count - visible; i++) {
                $bullets.append('<span class="product-slider__bullet">');
            }

            $bullets = $bullets.children();
            updateBullets();
        }


        function updateVisible () {
            visible = Math.round(getViewport()[0] / $productCard.outerWidth(true));
        }

        function updateContainerOffset () {
            var offset = visible != 1 ? 100 / count * (1 - index) : 0;

            $container.css({
                'transform': 'translate(' + offset + '%,0)',
                '-moz-transform': 'translate(' + offset + '%,0)',
                '-webkit-transform': 'translate(' + offset + '%,0)',
                '-ms-transform': 'translate(' + offset + '%,0)'
            });
        }

        function updateBullets () {
            $bullets.removeClass('product-slider__bullet--active');
            $bullets.eq(index).addClass('product-slider__bullet--active');
        }

        function updateControls () {
            if (hasPrevious()) {
                $slider.removeClass('js-first')
            } else {
                $slider.addClass('js-first')
            }

            if (hasNext()) {
                $slider.removeClass('js-last')
            } else {
                $slider.addClass('js-last')
            }
        }
    });


});