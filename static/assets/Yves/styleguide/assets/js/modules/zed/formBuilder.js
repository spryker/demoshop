import $ from 'jquery';

'use strict';


var $form = $('.block-form');

if ($form.size()) {

    var blockData, blockBlueprint, $container, result;

    var $formData = $('.block-form__content textarea');
    var $formBlueprint = $('.block-form__blueprint textarea');

    initForm();
}

$form.submit(function(event) {
    event.preventDefault();

    var data = getDataFromUi($('.block-form__container').first());
    $formData.val(JSON.stringify(data, '', '    '));
});

$(document).on('click', '.block-form__add', function () {
    var $button = $(this);
    var $template = $(this).siblings('.block-form__instance--template');

    // TODO: extract
    var $clone = $template.clone().removeClass('block-form__instance--template');

    $button.parent().append($clone);
});

$(document).on('click', '.block-form__remove', function () {
    $(this).parent().remove();
});

$(document).on('blur', '.block-form__container input, .block-form__container textarea', function () {
    var data = getDataFromUi($('.block-form__container').first());
    $formData.val(JSON.stringify(data, '', '    '));
});

$(document).on('blur', '.block-form__content', function () {
    initForm();
});


// append generated form elements
function initForm() {

    var $formElements;

    // get json data
    try {
        blockData = JSON.parse($formData.val() || "{}");
        blockBlueprint = JSON.parse($formBlueprint.val() || "{}");
    } catch (e) {
        alert('Invalid JSON');
    }

    $formElements = createForm(blockBlueprint);
    $formElements = populateForm($formElements, blockData);

    $form.find('.block-form__container').remove();
    $form.find('.block-form__submit').before($formElements);
}

function createForm(blockBlueprint) {

    return parseObject(blockBlueprint);
}

function parseObject(object, parentKey) {
    var $container = $(`<div>`);

    if (object.fields) {
        $container.addClass('block-form__container');

        if (parentKey) {
            $container.attr('data-key', parentKey);
        }

        for (var i in Object.keys(object.fields)) {
            var key, content;

            // use keys to preserve order
            key = Object.keys(object.fields)[i];

            // fallback for value null
            content = object.fields[key] || '';

            $container.append(parseObject(content, key));
        }

        if (object.multiple) {
            $container.addClass('block-form__container--array');

            var $instance = $(`<div class="block-form__instance">`);
            $container.prepend($instance);
            $instance.append($container.children());
            $instance.prepend($(`<button class="block-form__remove button button--cta">Remove</button>"`));

            $container.prepend($instance.clone().addClass('block-form__instance--template'));

            $container.prepend(`<button class="block-form__add button button--cta">Add</button`);

        } else {
            $container.addClass('block-form__container--object');
        }

        if (parentKey) {
            $container.prepend(`<label>${parentKey}</label>`);
        }

    } else {
        $container.addClass('block-form__wrapper');

        switch (object.type) {
            case 'text':
                $container.append($(`
                <label>${parentKey}</label>
                <input name="${parentKey}" type="text" class="block-form__input">
            `));
            break;

            case 'textarea':
                $container.append($(`
                <label>${parentKey}</label>
                <textarea name="${parentKey}" class="block-form__textarea"></textarea>
            `));
            break;
        }
    }

    return $container;
}

function populateForm($form, blockData) {

    var $instances;

    if (typeof blockData.length !== 'undefined') {
        $instances = $form.find('> .block-form__instance:not(.block-form__instance--template)');

        while ($instances.size() < blockData.length) {
            $form.append($form.find('> .block-form__instance--template').clone().removeClass('block-form__instance--template'));
            $instances = $form.find('> .block-form__instance:not(.block-form__instance--template)');
        }
    }

    for (var i in Object.keys(blockData)) {
        var key, content;

        // use keys to preserve order
        key = Object.keys(blockData)[i];
        content = blockData[key];

        if (typeof content === 'object') {
            var $subform

            if (!isNaN(parseInt(key, 10))) {
                $subform = $instances.eq(key);
            } else {
                $subform = $form.find('[data-key="' + key + '"]');
            }

            populateForm($subform, content);

        } else {
            var $element = $form.find('> .block-form__wrapper [name="' + key + '"]');

            //console.info(key, $element, content);
            $element.val(content);
        }
    }

    return $form;
}



function getDataFromUi($element, type) {
    var $entries, data;


    $entries = $element.find('> .block-form__wrapper .block-form__input, > .block-form__wrapper .block-form__textarea');

    data = type === 'array' ? [] : {};

    $entries.each(function() {
        var key, value;

        key = $(this).attr('name');
        value = $(this).val();

        if (type === 'array') {
            data.push(value);

        } else {
            // parse emtpy string back to null
            if (value) {
                data[key] = value;
            }
        }
    });

    var $containers = $element.find('> .block-form__container');
    $containers.each(function() {
        var key, type;

        key = $(this).attr('data-key');

        type = $(this).hasClass('block-form__container--array') ? 'array' : 'object';

        data[key] = getDataFromUi($(this), type);
    });

    var $instances = $element.find('> .block-form__instance:not(.block-form__instance--template)');
    $instances.each(function() {
        type = $(this).hasClass('block-form__container--array') ? 'array' : 'object';

        data.push(getDataFromUi($(this), type))
    });

    return data;
}