/**
 * 
 * description_here
 * @copyright: Spryker Systems GmbH
 *
 */

'use strict';

require('jquery');
require('jquery-ui');
require('holderjs');
require('bootstrap-sass');
require('../sass/main.scss');

var imagesRequire = require.context('../img', true);
imagesRequire.keys().forEach(function(key) {
    imagesRequire(key);
});

function showHideElement(elementIdOrClass) {
    var categoriesElement = $(elementIdOrClass);
    if (categoriesElement.is(':visible')) {
        categoriesElement.fadeOut('fast');
        return;
    }
    categoriesElement.fadeIn('fast');
}

var headerSearchBox = new function() {
    var self = this;
    self.initialized = false;
    self.isActive = false;

    self.searchElement = null;
    self.searchBox = null;

    self.focusSearchBox = function() {
        self.searchBox.focus();
    };

    self.activateSearchBox = function() {
        self.searchElement.addClass('active');
        self.isActive = true;
        self.focusSearchBox();
    };

    self.deactivateSearchBox = function() {
        if (self.isActive && self.searchBox.val().length === 0) {
            self.searchElement.removeClass('active');
            self.isActive = false;
        }
    };

    self.init = function() {
        if (self.initialized === true) {
            return;
        }

        self.searchElement = $('.js-search');
        self.searchBox = $('.js-search-box');
        self.searchElement.hover(self.activateSearchBox, self.deactivateSearchBox);

        self.initialized = true;
    };
};

var productQuantityUpdater = new function(){
    var self = this;
    self.currentQuantity = 1;

    self.minus = function(){
        if (self.currentQuantity < 2) {
            self.currentQuantity = 1;
            return;
        }
        self.currentQuantity = self.currentQuantity - 1;
    };

    self.plus = function(){
        self.currentQuantity = self.currentQuantity + 1;
    };

    self.updateValue = function(){
        $('#product-quantity').val(self.currentQuantity);
    };

    self.getCurrentValue = function(){
        self.currentQuantity = parseInt($('#product-quantity').val());
    };

    self.init = function(element) {

        self.getCurrentValue();

        if (element.hasClass('quantity-minus')) {
            self.minus();
        }
        if (element.hasClass('quantity-plus')) {
            self.plus();
        }

        self.updateValue();
    };
};

var categoryListingPriceFilter = new function(){
    var self = this;

    self.updateMinValue = function(value){
        $('#price-range-min').val(value);
    };
    self.updateMaxValue = function(value){
        $('#price-range-max').val(value);
    };

    self.updateSelectedValues = function(ui){
        self.updateMinValue(ui.values[0]);
        self.updateMaxValue(ui.values[1]);
    };

    self.init = function(){
        var sliderOptions = {
            range: true,
            min: 1,
            max: 10,
            values: [1, 10],
            slide: function( event, ui ) {
                self.updateSelectedValues(ui);
            }
        };
        self.updateMinValue(sliderOptions.min);
        self.updateMaxValue(sliderOptions.max);
        $( "#price-range" ).slider(sliderOptions);
    };
};

var AjaxCall = new function(){
    var self = this;

    /** if ajax url is null, the action will be in the same page */
    self.url = null;
    self.method = 'post';
    self.dataType = 'json';

    /**
     * @returns {AjaxCall}
     */
    self.setGet = function(){
        self.method = 'get';
        return self;
    };

    /**
     * @returns {AjaxCall}
     */
    self.setPost = function(){
        self.method = 'post';
        return self;
    };

    /**
     * @param {string} newUrl
     * @returns {AjaxCall}
     */
    self.setUrl = function(newUrl){
        self.url = newUrl;
        return self;
    };

    /**
     * @param {Object} newDataType
     * @returns {AjaxCall}
     */
    self.setDataType = function(newDataType){
        self.dataType = newDataType;
        return self;
    };

    /**
     * makes Ajax call and then call a callback function with the response as parameter
     *
     * @param {Object} options
     * @param callbackFunction
     */
    self.ajaxSubmit = function(options, callbackFunction) {
        $.ajax({
            url: self.url,
            type: self.method,
            dataType: self.dataType,
            data: options
        })
        .done(function(response, textStatus, xhr){
            if (typeof callbackFunction === 'function') {
                return callbackFunction(response, xhr);
            }

            return { ajaxResponse: response, xhr: xhr };
        })
        .error(function(response){
            // @todo show a swal message
            alert('something went wrong with the ajax call');
        });

        self.setPost();
    };

};

var CTA = new function(){
    var self = this;

    var actions = {
        'addToCart': function(element){
            var sku = element.data('sku');

            AjaxCall.setUrl('/cart/add/' + sku).ajaxSubmit({
                'quantity': $('#product-quantity').val()
            }, function(response){
                if (response.success === true) {
                    self.getCart();
                }
                console.log(response);
            });
        },
        'getCart': function(){
            AjaxCall.setUrl('/cart/overlay')
                .setGet()
                .setDataType('html')
                .ajaxSubmit({}, function(ajaxResponse){
                    $('#header-cart-list').html(ajaxResponse);
            });
        }
    };

    self.getCart = function(){
        actions['getCart']();
    };

    self.run = function(element){

        var action = element.data('action');

        if (typeof actions[action] === 'function') {
            actions[action](element);

            return;
        }

        // @todo show a swal message
        alert('something went wrong');
    };
};

$(document).ready(function () {
    /**
     *  DO NOT ADD LOGIC IN DOCUMENT READY
     */
    headerSearchBox.init();

    $('#nav-categories').click(function(e){
        e.preventDefault();

        showHideElement('.header-categories');
    });

    $('.quantity-modifier a').click(function(e){
        e.preventDefault();

        productQuantityUpdater.init($(this));
    });

    categoryListingPriceFilter.init();

    $('.cta').click(function(e){
        e.preventDefault();

        CTA.run($(this));
    });

    CTA.getCart();
});
