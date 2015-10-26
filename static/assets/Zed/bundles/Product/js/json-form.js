(function () {

  var $form = $('.json-form');

  if ($form.size()) {

    var products, $container, result;

    var $formData = $('.json-form__data');


    initForm();


    // event handling: add/remove array items
    $(document).on('click', '.js-add-item', function () {
      var $clone = $($(this).parent().attr('data-template'));
      $(this).before($clone);
    });

    $(document).on('click', '.js-remove-item', function () {
      $(this).parent().remove();
    });

    // before submit: create json data from form elements
    $form.submit(function (event) {
      var data = getDataFromUi($('.json-form__container').first());
      $formData.val(JSON.stringify(data));
    });

    $formData.bind('change', function () {
      initForm();
    });

  }



  // append generated form elements
  function initForm () {
      // cleanup if rebuild
      $('.json-form__container').remove();

      $container = $('<div class="json-form__container">').wrap('<div class="ibox">');

      // get json data
      try {
          products = JSON.parse($formData.val());
      } catch (e) {
          alert('Invalid JSON');
      }

      // parse data
      parseObject(products, $container);
      $form.prepend($container);

      // append button to remove item
      $container.find('.json-form__container--array').children('.json-form__entry, .json-form__container').prepend('<div class="json-form__button js-remove-item btn btn-sm btn-outline btn-danger">Remove</div>');

      // create array item template from first elements
      $container.find('.json-form__container--array').each(function () {
        var $template = $(this).children('.json-form__container, .json-form__entry').eq(0).clone();

        if ($template.size()) {
          prepareTemplate($template);
          $(this).attr('data-template', $template.prop('outerHTML'));

          // append button to add more items
          $(this).append('<div class="json-form__button js-add-item btn btn-sm btn-outline btn-info">Add</div>');
        }
      });
  }


  // strip out textarea content and remove multiple array items
  function prepareTemplate ($element) {
    if ($element.hasClass('array')) {
      $element.find('.json-form__container:not(:first)').remove();
    }

    $element.find('textarea').text('');
  }


  // iterate through the given object and create dom elements according to content
  function parseObject(object, $parent) {

    for (var i in Object.keys(object)) {
      var key, value;

      // use keys to preserve order
      key = Object.keys(object)[i];
      // fallback for value null
      content = object[key] || '';

      switch (typeof content) {
        case 'string':
        case 'number':
          addTextfield($parent, key, content)
          break;

        case 'object':
          var $subparent;

          if (typeof content.length === 'undefined') {
            $subparent = $('<div class="json-form__container json-form__container--object" data-key="' + key + '"></div>');

          } else {
            $subparent = $('<div class="json-form__container json-form__container--array" data-key="' + key + '"></div>');
          }

          if (isNaN(parseInt(key, 10))){
            $subparent.prepend($('<p class="json-form__key">' + key + '</p>'));
          }

          $parent.append($subparent);
          parseObject(content, $subparent)

          break;
      }
    }
  }


  // add text element to given parent dom element
  function addTextfield($parent, key, value) {
    var $el = $('<div class="json-form__entry"><textarea data-key="' + key + '">' + value + '</textarea></div>');

    // no label for array indices
    if (isNaN(parseInt(key, 10))){
      $el.prepend('<label for="' + key + '">' + key + '</label>');
    }

    $parent.append($el);
  }


  // parse given dom element and descendants and create object out of them
  function getDataFromUi ($element, type) {
    var $entries, data;

    $entries = $element.find('> .json-form__entry textarea');
    data = type === 'array' ? [] : {};

    $entries.each(function () {
      var key, value;

      key = $(this).attr('data-key');
      value = $(this).val();

      if (type === 'array') {
        data.push(value);

      } else {
        // parse emtpy string back to null
        data[key] = (value === '') ? null : value;
      }
    });

    var $containers = $element.find('> .json-form__container');
    $containers.each(function () {
      var key, type;

      key = $(this).attr('data-key');
      type = $(this).hasClass('json-form__container--object') ? 'object' : 'array';

      data[key] = getDataFromUi($(this), type);
    });

    return data;
  }

}())