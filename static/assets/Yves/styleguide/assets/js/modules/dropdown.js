import $ from 'jquery';

'use strict';


$(document).ready(function () {

    $('.dropdown').each(function () {

        var $dropdown, $select, $button;

        $dropdown = $(this);
        $select = $dropdown.find('select');
        $button = $(`<div class="dropdown__button"></div>`);

        $select.after($button);

        updateButton();
        $select.change(updateButton);

        function updateButton () {
            $button.text($select.find('option:selected').text());
        };

        $select.bind('change', updateButton);


        $select.bind('focus', function () {
            $dropdown.addClass('dropdown--focussed');
        });

        $select.bind('blur', function () {
            $dropdown.removeClass('dropdown--focussed');
        });
    });

});