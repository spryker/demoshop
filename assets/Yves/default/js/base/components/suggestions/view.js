'use strict';

var $ = require('jquery');
var _ = require('lodash');

var throttleTime = 32;
var debounceTime = 300;

module.exports = {
    init: function($root, options) {
        this.$root = $root;
        this.$input = $('.js-input', this.$root);
        this.$inputShadow = $('.js-input-shadow', this.$root);
        this.$panel = $('.js-panel', this.$root);
        this.keyboardCodes = options.keyboardCodes;

        this.mapEvents();
    },

    getNavigationItems: function() {
        return $('.js-navigable', this.$root);
    },

    getNavigationActiveItem: function() {
        return $('.js-navigable.is-active', this.$root);
    },

    getNavigationProducts: function() {
        return $('.js-navigable.js-product', this.$panel);
    },

    mapEvents: function() {
        this.$input
            .on('click', this.onClick.bind(this))
            .on('keydown', _.throttle(this.onTyping.bind(this), throttleTime))
            .on('keyup', _.debounce(this.onTyped.bind(this), debounceTime))
            .on('focus', this.onFocus.bind(this))
            .on('blur', this.onBlur.bind(this));
    },

    onClick: function() {
        this.setState({
            navigationIndex: 0
        });
    },

    onTyping: function(e) {
        var code = e.keyCode || e.which;

        switch (this.keyboardCodes[code]) {
            case 'tab': return this.onTab();
            case 'enter': return this.onEnter();
            case 'arrowUp':return this.onArrowUp();
            case 'arrowDown': return this.onArrowDown();
            case 'arrowLeft': return this.onArrowLeft();
            case 'arrowRight': return this.onArrowRight();
        }
    },

    onTyped: function() {
        var query = this.$input.val() || '';

        this.setState({
            query: query.trim()
        });
    },

    onFocus: function() {
        this.setState({
            visible: true
        });
    },

    onBlur: function() {
        this.setState({
            visible: false
        });
    },

    onTab: function() {
        this.updateInput();
        return false;
    },

    onEnter: function() {
        var href = this.getNavigationActiveItem()
            .closest('a')
            .attr('href');

        if (href) {
            window.location.href = href;
            return false;
        }
    },

    onArrowUp: function() {
        var index = this.state.navigationIndex - 1;

        if (index < 0) {
            index = 0;
        }

        this.setState({
            navigationIndex: index
        });

        return false;
    },

    onArrowDown: function() {
        var length = this.getNavigationItems().length;
        var index = this.state.navigationIndex + 1;

        if (index >= length) {
            index = 0;
        }

        this.setState({
            navigationIndex: index
        });

        return false;
    },

    onArrowLeft: function() {
        var length = this.getNavigationItems().length;
        var index = this.state.navigationIndex > 0 ? 1 : 0;

        if (index >= length) {
            index = 0;
        }

        this.setState({
            navigationIndex: index
        });
    },

    onArrowRight: function() {
        var itemsLength = this.getNavigationItems().length;
        var productsLength = this.getNavigationProducts().length;
        var index = this.state.navigationIndex > 0 ? itemsLength - productsLength : 0;

        this.setState({
            navigationIndex: index
        });
    },

    updateVisibility: function() {
        if (this.state.visible) {
            return this.$panel
                .stop()
                .removeClass('is-hidden');
        }

        this.$panel
            .delay(500)
            .queue(function(next) {
                $(this).addClass('is-hidden');
                next();
            });
    },

    updateInput: function() {
        this.$input.val(this.state.hint);
    },

    updateHint: function() {
        this.$inputShadow.val(this.formatHint());
    },

    updateSuggestions: function() {
        this.$panel.html(this.state.suggestions);
    },

    updateNavigation: function() {
        this.getNavigationItems()
            .removeClass('is-active')
            .eq(this.state.navigationIndex)
            .addClass('is-active');
    },

    formatHint: function() {
        var query = this.state.query;
        var hint = this.state.hint;
        var value = query;

        if (hint) {
            value += hint.slice(query.length);
        }

        return value;
    }

};
