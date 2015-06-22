'use strict';

require ('jquery-ui/slider');
var $ = require('jquery'),
    catalog = require('./index'),
    URLUtils = require('../../utils/URLUtils'),
    URLManager = require('./URLManager'),
    Filter = require('./Filter');

var filters = [];

var updatePriceValueDisplay = function(event, ui) {
  var min = ui.values[0];
  var max = ui.values[1];
  $('.js-filter-price-min').html(min);
  $('.js-filter-price-max').html(max);
};

var triggerPriceChange = function(event, ui) {
  $(ui.handle).parents('.js-filter').trigger('change');
}

var initActiveFilterList = function() {
  $('.js-filter').on('change', function(e) {
    var changedFilterName = $(e.currentTarget).data('filter-name');
    updateActiveFilterList(getFilter(changedFilterName));

    $('.js-products-prev').remove();
    $('.js-products-next').remove();

    var $filtered = $(catalog.template);
    $filtered.addClass('js-products-current').replaceAll('.js-products-current');
    catalog.loadProducts(
        URLManager.getPath(),
        URLManager.paramsToString(getUpdatedParams()),
        $($filtered)
    );
  });

  $('.js-filter-remove').on('click', function(e) {
    var filterName = $(e.currentTarget).parent().data('filter-name');
    getFilter(filterName).clear();
  });
};

// select filters based on URL params
var selectRequiredFilters = function() {
  var paramName, filter;
  var params = URLManager.getParams();
  for (paramName in params) {
    if (filter = getFilter(paramName)) {
      filter.setSelectedValue(params[paramName]);
      updateActiveFilterList(filter, true);
    }
  }
};

var updateActiveFilterList = function(changedFilter, silent) {
  var $activeEl = $('.active-filter[data-filter-name="'+changedFilter.name+'"');
  var filterValue = changedFilter.getSelectedValue(true);

  $activeEl.attr('data-filter-value', filterValue);
  $activeEl.find('.js-filter-value').text(filterValue);

  if (!silent) {
    updateURL();
  }
};

var getFilter = function(filterName) {
  for (var i = 0; i < filters.length; i++) {
    if (filters[i].name == filterName) {
      return filters[i];
    }
  };
};

var updateURL = function() {
  var params = getUpdatedParams();
  URLManager.setParams(params);
};

var getUpdatedParams = function() {
  var paramName;
  var paramString = '';
  var params = URLManager.getParams();
  var filterParams = {};
  for (var i = 0; i < filters.length; i++) {
    params[filters[i].getURLName()] = filters[i].getURLValue();
  };

  for (paramName in filterParams) {
    params[paramName] = filterParams[paramName];
  }

  params.page = 1;

  return params;
};

var initMobileFilterHiding = function() {
  var $filtersEl;
  var filtersHidden = false;

  $filtersEl = $('.js-filters');
  $filtersEl.css('height', $filtersEl.innerHeight())
  $filtersEl.addClass('js-filters-hidden');
  filtersHidden = true;

  $('.js-toggle-filters').click(function(e) {
    $filtersEl.toggleClass('js-filters-hidden');
  });
};

module.exports = {
  init: function() {
    $('.js-filter').each(function() {
      filters.push(new Filter($(this)));
    });

    initActiveFilterList();
    selectRequiredFilters();

    initMobileFilterHiding();
  }
}
