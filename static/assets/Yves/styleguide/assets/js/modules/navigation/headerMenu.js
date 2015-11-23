import $ from 'jquery';
import { debounce } from '../common/helpers';
import { ToastService } from '../common/toast';

import { EVENTS as NAVBAR_EVENTS } from './navbar';
import { EVENTS as BODY_EVENTS } from '../common/bodyScrolling';

'use strict';


$(document).ready(function () {

    $('.menu').each(function () {
        var $menu, $close, $trigger, height, closed, $slider, index;

        $menu = $(this);
        $slider = $menu.find('.menu__slider');
        $close = $menu.find('.close-button');
        $trigger = $('.navbar__link[data-menu]');

        updateHeight();
        hideMenu();


        $close.click(hideMenu);

        $trigger.click(function (e) {
            e.preventDefault();

            var $target, index;

            $target = $(e.target).closest('.navbar__link');

            e.preventDefault();
            showMenu($trigger.index($target));

            $trigger.removeClass('navbar__link--open');
            $(this).addClass('navbar__link--open');

            $(document).trigger(NAVBAR_EVENTS.NAVSTATE_CHANGE);
        });

        $('.navbar__link--login').click(function (e) {
            e.preventDefault();

            var toast = new ToastService();
            toast.show({
                message: 'Login layer'
            });
        });

        $(window).resize(debounce(250, function () {
            updateHeight();

            if (closed) {
                hideMenu(true);

            } else {
                showMenu(index, true);
            }
        }));

        $menu.click(function (e) {
            var $target = $(e.target);

            // #TODO:0 abstract class
            if ((!$target.parents('.menu__inner').size() && !$target.hasClass('menu__inner')) && (!$target.parents('.cart-layer__inner').size() && !$target.hasClass('cart-layer__inner'))) {
                hideMenu();
            }
        });

        // TODO: refine transition as for the configurator
        function hideMenu (disableTransition) {
            if (typeof disableTransition === 'boolean' && disableTransition) {
                $menu.removeClass('js-processed');
            }

            closed = true;
            $menu.css({
                'margin-top': -height
            });
            $menu.removeClass('menu--open');

            setTimeout(function () {
                $menu.addClass('js-processed');
            });

            $trigger.removeClass('navbar__link--open');
            $(document).trigger(NAVBAR_EVENTS.NAVSTATE_CHANGE);

            $(document).trigger(BODY_EVENTS.ENABLE_SCROLLING);

        }

        function showMenu (newIndex, disableTransition) {
            $(document).trigger(BODY_EVENTS.DISABLE_SCROLLING);

            if (typeof disableTransition === 'boolean' && disableTransition) {
                $menu.removeClass('js-processed');
            }

            if (newIndex !== index) {

                if (!$menu.hasClass('menu--open')) {
                    $menu.removeClass('js-hor-trans');
                }

                index = newIndex;

                // #TODO:450 dynamic offset
                var offset = 100 / -5 * index ;

                $slider.css({
                    'transform': 'translate(' + offset + '%,0)',
                    '-moz-transform': 'translate(' + offset + '%,0)',
                    '-webkit-transform': 'translate(' + offset + '%,0)',
                    '-ms-transform': 'translate(' + offset + '%,0)'
                });
            }

            closed = false;
            $menu.css({
                'margin-top': 0
            });
            $menu.addClass('menu--open');

            setTimeout(function () {
                $menu.addClass('js-hor-trans');
                $menu.addClass('js-processed');
            });

            $('html, body').animate({
                scrollTop: 0
            }, $(window).scrollTop);
        }

        function updateHeight () {
            height = $menu.height();
        }
    });

});