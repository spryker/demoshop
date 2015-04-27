'use strict';

require ('jquery-ui/slider');
var $ = require('jquery'),
    catalog = require('./index');

var Filter = function ($el) {
  this.$el = $el;
  this.type = $el.data('filter-type');
  this.name = $el.data('filter-name');

  if (this.type == 'range') {
    var $slider = this.$el.find('.js-slider');
    var that = this;
    this.min = this.$el.data('min');
    this.max = this.$el.data('max');
    $slider.slider({
      range: true,
      max: this.max,
      values: [this.min, this.max],
      animate: 'fast',
      // slide: updatePriceValueDisplay,
      // change: triggerPriceChange
    });

    $slider.on('slidechange', function(event) {
      // programmatic changes don't include mouse coordinate information
      // so this ensures that we only repond to user-initiated events
      if (event.clientX) {
        that.$el.trigger('change');
      }
    });
    $slider.on('slide', function(event, ui) {
      var min = ui.values[0];
      var max = ui.values[1];
      that.updateSliderValueDisplay(min, max);
    });
  } else if (this.type == 'color') {
    this.$el.find('.js-color-name').each(function(i, el) {
      var color = $(el).siblings(':radio').data('color');
      $(el).css('background-color', color);
    });
  }
};

Filter.prototype.getSelectedValue = function(display) {
  var $selected;

  if (this.type == 'range') {
    var values = this.$el.find('.ui-slider').slider('values');
    if (values[0] === this.min && values[1] === this.max) {
      return '';
    } else  if (display) {
      return '€ '+values[0]+' - € '+values[1];
    } else {
      return values[0]+'-'+values[1];
    }
  } else if (this.type == 'multivalue') {
    $selected = this.$el.find('[type="checkbox"]:checked');
  } else if (this.type == 'default' || this.type == 'color') {
    $selected = this.$el.find('[type="radio"]:checked');
  }

  if ($selected.length === 0) {
    // nothing selected
    return '';
  } else if ($selected.hasClass('js-filter-default-value')) {
    // if it's the default value, don't show an active filter
    return '';
  } else {
    if (display) {
      return this.getTextValue($selected);
    } else {
      var value = '';
      var separator = '+';
      $selected.each(function() {
        value += $(this).attr('value')+separator;
      });
      return value.substr(0, value.length - separator.length);
    }
  }
};

Filter.prototype.setSelectedValue = function(value) {
  var values;
  if (this.type == 'default' || this.type == 'color') {
    this.$el.find("[value='"+value+"']").prop('checked', true);
  } else if (this.type == 'range') {
    values = value.split('-');
    this.$el.find('.js-slider').slider('values', values);
    this.updateSliderValueDisplay(values[0], values[1]);
  } else if (this.type = 'multivalue') {
    values = value.split('+');
    for (var i = 0; i < values.length; i++) {
      this.$el.find("[value='"+values[i]+"']").prop('checked', true);
    }
  }
};

Filter.prototype.getDefaultValue = function() {
  var $default;
  if (this.type == 'default' && this.$el.find('.js-filter-default-value').length) {
    return this.getTextValue(this.$el.find('.js-filter-default-value'));
  } else if (this.type == 'range') {
    return this.min+'-'+this.max;
  }
};

Filter.prototype.hasDefaultValue = function() {
  return this.$el.find('.js-filter-default-value').length > 0;
};

Filter.prototype.getTextValue = function($value) {
  var text = "";
  var separator = " + ";

  if (this.type == 'color') {
    return $value.attr('value');
  }

  $value.each(function() {
    $(this).siblings('label').contents().each(function() {
      if (this.nodeType == Node.TEXT_NODE && this.textContent.trim().length > 0) {
        text += this.textContent.trim() + separator;
      }
    });
  });
  return text.substr(0, text.length - separator.length);
};

Filter.prototype.getURLName = function() {
  return this.name;
};

Filter.prototype.getURLValue = function() {
  return this.getSelectedValue(false);
};

Filter.prototype.clear = function() {

  if (this.type == 'multivalue') {
    this.$el.find('[type="checkbox"]:checked').attr('checked', false);
  } else if (this.type == 'default' || this.type == 'color') {
    this.$el.find('[type="radio"]:checked').prop('checked', false);
    if (this.hasDefaultValue()) {
      this.$el.find('.js-filter-default-value').prop('checked', true);
    }
  } else if (this.type == 'range') {
    var $slider = this.$el.find('.ui-slider');
    $slider.slider('values', [this.min, this.max]);
    $slider.trigger('slide', [{ values: [this.min, this.max] }]);
    this.updateSliderValueDisplay(this.min, this.max);
  }

  this.$el.trigger('change');
};

Filter.prototype.updateSliderValueDisplay = function(min, max) {
  this.$el.find('.js-filter-value-min').html(min);
  this.$el.find('.js-filter-value-max').html(max);
};

module.exports = Filter;