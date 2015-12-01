import $ from 'jquery';

'use strict'


function validateForm ($element) {

    var $inputs, $select, result;

    valid = true;

    $inputs = $element.find('input');
    $selects = $element.find('select');

    $inputs.each(function () {
        var $input = $(this);

        console.info(this);

        valid = valid && validateInput().valid;
    });

    $selects.each(function () {
        var $select = $(this);

        console.info(this);

        valid = valid && true;
    });

    console.info(valid);

    return valid;
}


function validateInput ($element) {

    var $input, value, dataRequired, required, result, $label, label;

    result = {
        valid: true,
        messages: []
    };

    $label = $element.find('.input__label');
    label = $label.size() ? $label.text() : 'Das';

    $input = $element.find('.input__text');
    value = $input.val();

    dataRequired = $input.data('required') && $('[name="' + $input.data('depending-field') + '"]').filter(':checked').val() === $input.data('depending-value');
    required = $input.prop('required') || dataRequired;

    if (required) {
        if (value.length === 0) {
            result.valid = result.valid && false;
            result.messages.push(`${label} ist ein Pflichtfeld.`);
        } else {
            result.valid = result.valid && true;
        }
    }

    return result;
}


function validateRadio ($element) {


    var $radio, $radios, name, required, result;

    result = {
        valid: true,
        messages: []
    };

    $radio = $element.find('input[type="radio"]');
    name = $radio.attr('name');
    $radios = $element.siblings('.radio').andSelf().find(`input[type="radio"][name="${name}"]`);
    required = $input.prop('required');

    if (required) {
        if (!$radios.val().length) {
            result.valid = result.valid && false;
        }
    }

    return result;
}


export { validateInput, validateForm }