import $ from 'jquery';
import { EVENTS as INPUT_EVENTS } from '../forms/input';


'use strict';


$(document).ready(function () {

    $('.js-formbackup').each(function () {
        var $form, $items, namespace, formKey, storage;

        $form = $(this);
        $items = $form.find('input, textarea').not('[autocomplete="off"]');

        formKey = 'pd.' + $form.data('formbackup');
        storage = window.localStorage;

        restoreFromBackup();

        $items.change(updateBackup);


        // store form data by form key in localstorage
        function updateBackup () {
            var data = {};

            $items.each(function () {
                var $item = $(this);
                data[$item.attr('name')] = $item.val();
            });

            storage.setItem(formKey, JSON.stringify(data));
        }

        // populate form with data form localstorage
        function restoreFromBackup () {
            var raw = storage.getItem(formKey);

            if (raw) {
                var data = JSON.parse(raw);

                for (let itemKey in data) {
                    $form.find('[name="' + itemKey + '"]').each(function () {
                        var $item = $(this);

                        if (!$item.val() && !!data[itemKey]) {
                            $item.val(data[itemKey]);
                        }
                    });
                }

                $(document).trigger(INPUT_EVENTS.VALIDATE);
            }
        }
    });

});