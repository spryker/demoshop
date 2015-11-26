import $ from 'jquery';
import { prefixCss, scrollTo } from '../../common/helpers';
import { MessageService } from '../../common/messages';

'use strict';


$(document).ready(function () {

    $('.checkout').each(function () {

        var $checkout, $navigations, $contentContainer, $contents, index, messageService;

        $checkout = $(this);
        $navigations = $checkout.find('.checkout__navigation');
        $contentContainer = $checkout.find('.checkout__contents')
        $contents = $contentContainer.find('.checkout__content')

        $contentContainer.css({'width': 100 * $contents.size() + '%'});
        $contents.css({'width': 100 / $contents.size() + '%'});

        messageService = new MessageService();

        index = 0;
        updateStep();

        $contents.find('.checkout__step-button').click(function () {
            if (validate()) {
                index++;
                updateStep();
            }
        });

        $navigations.click(function () {
            if (validate()) {
                index = $navigations.index($(this));
                updateStep();
            }
        });

        function updateStep () {
            var $navigation;

            $navigation = $navigations.eq(index);

            if (!$navigation.hasClass('checkout__navigation--active')) {
                scrollTo($('.checkout__headline'), 1, function () {
                    $navigations.removeClass('checkout__navigation--active');
                    $navigation.addClass('checkout__navigation--active');

                    $contentContainer.css(prefixCss({'transform': 'translate(' + (index * -100 / $contents.size()) + '%, 0)'}));
                });
            }
        }

        function validate () {

            //messageService.show({ type: 'invalid', message: 'Not valid' });

            return true;
        }

    });

});
