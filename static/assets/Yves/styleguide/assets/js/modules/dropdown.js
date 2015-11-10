import $ from 'jquery';

'use strict';


$(document).ready(function () {

    $('.js-select').each(function () {

        var $select, $button;

        $select = $(this);
        $select.wrap(`<div class="dropdown"></div>`);
        $button = $(`<div class="dropdown__button"></div>`);

        $select.after($button);

        updateButton();
        $select.change(updateButton);

        function updateButton () {
            $button.text($select.find('option:selected').text());
        };
    });

});