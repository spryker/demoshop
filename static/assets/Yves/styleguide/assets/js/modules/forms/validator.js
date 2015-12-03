import $ from 'jquery';
'use strict'


function validateForm ($element) {

    var $inputs, $radios, $checkboxes, result;

    result = {
        valid: true,
        messages: []
    };

    $inputs = $element.find('.input');
    $inputs.each(function () {
        var $input, validationResult;

        $input = $(this);
        validationResult = validateInput($input);

        result.valid = result.valid && validationResult.valid;
        result.messages = [].concat(result.messages, validationResult.messages);
    });

    $radios = $element.find('.radio');
    $radios.each(function () {
        var $radio, validationResult;

        $radio = $(this);
        validationResult = validateRadio($radio);

        result.valid = result.valid && validationResult.valid;
        result.messages = [].concat(result.messages, validationResult.messages);
    });

    $checkboxes = $element.find('.checkbox');
    $checkboxes.each(function () {
        var $checkbox, validationResult;

        $checkbox = $(this);
        validationResult = validateCheckbox($checkbox);

        result.valid = result.valid && validationResult.valid;
        result.messages = [].concat(result.messages, validationResult.messages);
    });

    return result;
}


function validateInput ($element) {

    var $input, value, dataRequired, required, result, $label, label;

    result = {
        valid: true,
        messages: []
    };

    $label = $element.find('.input__label');
    label = $label.size() ? $label.text().replace('*', '') : 'Das';

    $input = $element.find('.input__text');
    value = $input.val();

    dataRequired = $input.data('required') && $('[name="' + $input.data('depending-field') + '"]').filter(':checked').val() == $input.data('depending-value');
    required = $input.prop('required') || dataRequired;

    if (required) {
        if (value.length === 0) {
            result.valid = result.valid && false;
            result.messages.push(`${label} ist ein Pflichtfeld.`);
        } else {
            result.valid = result.valid && true;
        }

        // TODO: possibly separation of required and format validation necessary
        var regepx = $input.data('regexp');
        if (!!regepx) {
            var match = value.match(new RegExp(regepx));

            if (!match) {
                result.valid = result.valid && false;
                result.messages.push(`${label} ist ungültig.`);
            } else {
                result.valid = result.valid && true;
            }
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
    $radios = $element.siblings('.radio').andSelf().find(`input[type="radio"][name="${name}"]:checked`);
    required = $radio.prop('required');

    if (required) {
        if (!$radios.size()) {
            result.valid = result.valid && false;
        }
    }

    return result;
}


function validateCheckbox ($element) {
    var $checkbox, required, result;

    result = {
        valid: true,
        messages: []
    };

    $checkbox = $element.find('input[type="checkbox"]');
    required = $checkbox.prop('required');

    if (required) {
        if ($checkbox.is(':checked')) {
            result.valid = result.valid && true;

        } else {
            result.valid = result.valid && false;
        }
    }

    return result;
}


export { validateInput, validateRadio, validateCheckbox, validateForm }