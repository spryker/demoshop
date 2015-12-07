'use strict';

var headerSearchBox = new function() {
    var self = this;
    self.initialized = false;
    self.isActive = false;
    self.isFocused = false;

    self.searchElement = null;
    self.searchBox = null;

    self.focusSearchBox = function() {
        console.log('focus'); // todo
        self.searchBox.focus();
        self.isFocused = true;
    };

    self.activateSearchBox = function() {
        self.searchElement.addClass('active');
        console.log('activate'); // todo
        self.isActive = true;
        self.focusSearchBox();
    };

    self.deactivateSearchBox = function() {
        if (self.isActive && self.searchBox.val().length === 0) {
            self.searchElement.removeClass('active');
            self.isActive = false;
            self.isFocused = false;
        }
        console.log('deactivate'); // todo

    };

    self.init = function() {
        if (self.initialized === true) {
            return;
        }

        self.searchElement = $('.js-search');
        self.searchBox = $('.js-search-box');
        self.searchElement.hover(self.activateSearchBox, self.deactivateSearchBox);

        console.log('header search box');

        self.initialized = true;
    };
};

$(document).ready(function () {
    headerSearchBox.init();
});
