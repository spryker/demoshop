import $ from 'jquery';

'use strict';


$(document).ready(function () {

    $('.js-select').each(function () {

        var $select, $button;

        $select = $(this);
        $button = $(`<div class="dropdown__button"></div>`);

        $select.after($button);

        updateButton();
        $select.change(updateButton);

        function updateButton () {
            $button.text($select.find('option:selected').text());
        };
    });

});