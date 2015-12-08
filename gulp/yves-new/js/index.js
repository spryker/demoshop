'use strict';

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

function showHideElement(elementIdOrClass) {
    var categoriesElement = $(elementIdOrClass);
    if (categoriesElement.is(':visible')) {
        categoriesElement.fadeOut('fast');
        return;
    }
    categoriesElement.fadeIn('fast');
}

$(document).ready(function () {
    headerSearchBox.init();

    $('#nav-categories').click(function(e){
        e.preventDefault();

        showHideElement('.header-categories');
    });

});
