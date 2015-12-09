'use strict';

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

});
