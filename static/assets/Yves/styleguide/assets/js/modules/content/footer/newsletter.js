import $ from 'jquery';
import { getFormData } from '../../common/helpers';
import { MessageService } from '../../common/messages';

'use strict';


$(document).ready(function () {

    var messageService = new MessageService();

    $('.newsletter').each(function () {
        var $newsletter, $form;

        $newsletter = $(this);
        $form = $newsletter.find('.newsletter__form');

        $form.submit(function (e) {
            e.preventDefault();

            $.post($form.attr('action'), getFormData($form))
            .done(function (response) {
                var results = response.subscriptionsResults;

                for (let i in Object.keys(results)) {
                    let result = results[i];

                    console.info(result);

                    if (result.isSuccess) {
                        messageService.add({ type: 'valid', message: 'Success'});

                    } else {
                        messageService.add({ type: 'invalid', message: [result.name, result.errorMessage].join('.') });
                    }
                }
            })
            .fail(function () {
                messageService.add({ type: 'invalid', message: 'Es ist ein Fehler aufgetreten. Der Newsletter konnte nicht abboniert werden.' });
            });
        });

    });

});