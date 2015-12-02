import $ from 'jquery';
import { getFormData } from '../../common/helpers';
import { MessageService } from '../../common/messages';

'use strict';


$(document).ready(function () {

    $('.newsletter').each(function () {
        var $newsletter, $form;

        $newsletter = $(this);
        $form = $newsletter.find('.newsletter__form');

        $form.submit(function (e) {
            e.preventDefault();

            submitNewsletter($form.attr('action'), getFormData($form));
        });

    });

});

function submitNewsletter (action, parameters) {

    var messageService = new MessageService();

    $.post(action, parameters)
    .done(function (response) {
        var results = response.subscriptionsResults;

        for (let i in Object.keys(results)) {
            let result = results[i];

            if (result.isSuccess) {
                messageService.add({ type: 'valid', message: [result.name, 'newsletter.subscription.success'].join('.') });

            } else {
                messageService.add({ type: 'invalid', message: [result.name, result.errorMessage].join('.') });
            }
        }
    })
    .fail(function () {
        messageService.add({ type: 'invalid', message: 'newsletter.subscription.general_error' });
    });
}



export { submitNewsletter };