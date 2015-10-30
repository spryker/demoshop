import $ from 'jquery';

'use strict';


$(document).ready(function () {
    $('.faq-card').each(function () {
        var $card = $(this);

        $card.find('.faq-card__toggle, .faq-card__question').click(function () {
            var $answer = $card.find('.faq-card__answer');

            if ($card.hasClass('faq-card--active')) {
                $card.removeClass('faq-card--active');
                $answer.slideUp();

            } else {
                $card.addClass('faq-card--active');
                $answer.slideDown();
            }
        });
    });
});