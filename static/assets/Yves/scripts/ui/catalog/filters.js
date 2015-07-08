'use strict';

require('jquery-ui/slider');
var $ = require('jquery'),
    _ = require('underscore'),
    catalog = require('./index'),
    URLManager = require('./URLManager'),
    Filter = require('./Filter');

var filters = [];

var updatePriceValueDisplay = function (filter) {
    $('.filter__price').data('min', filter.min).data('max', filter.max);

    $('.filter__price-min').html(filter.min);
    $('.filter__price-max').html(filter.max);
};

var initActiveFilterList = function () {
    $('.js-filter').on('change', function (e) {
        var changedFilterName = $(e.currentTarget).data('filter-name');
        updateActiveFilterList(getFilter(changedFilterName));

        $('.js-products-prev').remove();
        $('.js-products-next').remove();

        var $filtered = $(catalog.template);
        $filtered.addClass('js-products-current').replaceAll('.js-products-current');
        catalog.loadProducts(
            URLManager.getPath(),
            URLManager.paramsToString(getUpdatedParams()),
            $filtered,
            updateFilters
        );
    });

    $('.js-filter-remove').on('click', function (e) {
        var filterName = $(e.currentTarget).parent().data('filter-name');
        getFilter(filterName).clear();
    });
};

var updateFilters = function (data) {
    var params = URLManager.getParams();

    _.each(filters, function (filter) {
        switch (filter.name) {
            case "price":
                filter.max = Math.ceil(data.price.rangeValues.max / 100);
                filter.min = Math.floor(data.price.rangeValues.min / 100);
                if (typeof data.price.activeValue !== "undefined") {
                    filter.setSelectedValue(filter.min + '-' + filter.max);
                }
                updatePriceValueDisplay(filter);
                break;
            case "main_color":
                var colorList = [];

                _.each(data.main_color.values, function (amount, color) {
                    var elem = '<li>'
                        + '<input type="radio" class="filter-main_color-42" name="filter-main_color" data-color="' + color + '" value="' + color + '" ' + (params.main_color == color ? 'checked="checked"' : "") + '>'
                        + '<label for="filter-main_color-' + color + '" class="js-color-name" style="background-color: ' + color + ';">' + color + ''
                        + '<span class="filter__quantity">' + amount + '</span></label'
                        + '</li>';

                    colorList.push(elem);
                });

                $('ul.filter__main_color-list').html(colorList.join());

                break;
        }
    });

    $('.js-filter').each(function () {
        filters.push(new Filter($(this)));
    });
};

// select filters based on URL params
var selectRequiredFilters = function () {
    var paramName, filter;
    var params = URLManager.getParams();
    for (paramName in params) {
        if (filter = getFilter(paramName)) {
            filter.setSelectedValue(params[paramName]);
            updateActiveFilterList(filter, true);
        }
    }
};

var updateActiveFilterList = function (changedFilter, silent) {
    var $activeEl = $('.active-filter[data-filter-name="' + changedFilter.name + '"');
    var filterValue = changedFilter.getSelectedValue(true);

    $activeEl.attr('data-filter-value', filterValue);
    $activeEl.find('.js-filter-value').text(filterValue);

    if (!silent) {
        updateURL();
    }
};

var getFilter = function (filterName) {
    for (var i = 0; i < filters.length; i++) {
        if (filters[i].name == filterName) {
            return filters[i];
        }
    }
    ;
};

var updateURL = function () {
    var params = getUpdatedParams();
    URLManager.setParams(params);
};

var getUpdatedParams = function () {
    var paramName;
    var paramString = '';
    var params = URLManager.getParams();
    var filterParams = {};
    for (var i = 0; i < filters.length; i++) {
        params[filters[i].getURLName()] = filters[i].getURLValue();
    }
    ;

    for (paramName in filterParams) {
        params[paramName] = filterParams[paramName];
    }

    params.page = 1;

    return params;
};

var initMobileFilterHiding = function () {
    var $filtersEl;
    var filtersHidden = false;

    $filtersEl = $('.js-filters');
    $filtersEl.css('height', $filtersEl.innerHeight())
    $filtersEl.addClass('js-filters-hidden');
    filtersHidden = true;

    $('.js-toggle-filters').click(function (e) {
        $filtersEl.toggleClass('js-filters-hidden');
    });
};

module.exports = {
    init: function () {
        $('.js-filter').each(function () {
            filters.push(new Filter($(this)));
        });

        initActiveFilterList();
        selectRequiredFilters();

        initMobileFilterHiding();
    }
};
