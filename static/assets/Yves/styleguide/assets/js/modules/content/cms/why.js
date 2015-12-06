import $ from 'jquery';
import { prefixCss } from '../../common/helpers';

'use strict';


$(document).ready(function () {

    $('.why__categories').each(function () {

        var $categories, $triggers, $container, $contents, index, count;

        $categories = $(this);
        $triggers = $categories.find('.why__categories-pet');
        $container = $categories.find('.why__categories-contents');
        $contents = $container.find('.why__categories-content');

        index = 0;
        count = $triggers.size();

        $triggers.click(function () {
            var $trigger, index;

            $trigger = $(this);

            if (!$trigger.hasClass('why__categories-pet--active')) {
                index = $triggers.index($trigger);

                $triggers.removeClass('why__categories-pet--active');
                $trigger.addClass('why__categories-pet--active');

                $container.css(prefixCss({'transform': 'translate(' + (100 / count * index * -1) + '%, 0)'}));
            }

        });
    });

});