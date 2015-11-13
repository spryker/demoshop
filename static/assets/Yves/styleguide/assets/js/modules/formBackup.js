import $ from 'jquery';
import { debounce } from './helpers';

'use strict';


$(document).ready(function () {

    $('.js-formbackup').each(function () {
        var $form, $items, namespace, formKey, storage;

        $form = $(this);
        $items = $form.find('input, textarea');

        formKey = 'pd.' + $form.data('formbackup');
        storage = window.localStorage;

        restoreFromBackup();

        $items.change(updateBackup);

        function updateBackup () {
            var data = {};

            $items.each(function () {
                var $item = $(this);
                data[$item.attr('name')] = $item.val();
            });

            storage.setItem(formKey, JSON.stringify(data));
        }

        function restoreFromBackup () {
            var raw = storage.getItem(formKey);

            if (raw) {
                var data = JSON.parse(raw);

                for (let itemKey in data) {
                    $form.find('[name="' + itemKey + '"]').each(function () {
                        var $item = $(this);

                        if (!$item.val()) {
                            $item.val(data[itemKey]);
                        }
                    });
                }
            }
        }
    });

});