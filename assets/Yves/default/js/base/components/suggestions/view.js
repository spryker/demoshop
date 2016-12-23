'use strict';

var $ = require('jquery');
var _ = require('lodash');

var threshold = 2;
var throttleTime = 150;
var debounceTime = 300;

module.exports = {
    init: function($root, state, options) {
        this.$root = $root;
        this.$input = $('.js-input', this.$root);
        this.$inputHint = $('.js-input-hint', this.$root);
        this.$panel = $('.js-panel', this.$root);

        this.state = state;
        this.keyboardCodes = options.keyboardCodes;

        this.mapEvents();
    },

    getSuggestionsUrl: function() {
        return this.$root.data('suggestions-url');
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
            .on('click', _.throttle(this.onClick.bind(this), throttleTime))
            .on('keydown', _.throttle(this.onKeyDown.bind(this), throttleTime))
            .on('keyup', _.debounce(this.onKeyUp.bind(this), debounceTime))
            .on('focus', this.onFocus.bind(this))
            .on('blur', this.onBlur.bind(this));
    },

    onClick: function() {
        this.state.set({
            navigationIndex: 0
        });
    },

    onKeyDown: function(e) {
        var code = e.keyCode || e.which;

        switch (this.keyboardCodes[code]) {
            case 'tab': return this.onTab(e);
            case 'enter': return this.onEnter(e);
            case 'arrowUp':return this.onArrowUp(e);
            case 'arrowDown': return this.onArrowDown(e);
            case 'arrowLeft': return this.onArrowLeft(e);
            case 'arrowRight': return this.onArrowRight(e);
            default: return this.toggleHintVisibility(false)
        }
    },

    onKeyUp: function() {
        var query = (this.$input.val() || '').trim();

        if (query.length >= threshold) {
            this.state.set({
                query: query.trim()
            });
        } else {
            this.state.set({
                visible: false,
                query: '',
                hint: '',
                suggestions: ''
            });
        }
    },

    onFocus: function() {
        this.state.set({
            visible: true,
            navigationIndex: 0
        });
    },

    onBlur: function() {
        this.state.set({
            visible: false,
            navigationIndex: 0
        });
    },

    onTab: function() {
        this.setQuery(this.state.current.hint);
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
        var index = this.state.current.navigationIndex - 1;

        if (index < 0) {
            index = 0;
        }

        this.state.set({
            navigationIndex: index
        });

        return false;
    },

    onArrowDown: function() {
        var length = this.getNavigationItems().length;
        var index = this.state.current.navigationIndex + 1;

        if (index >= length) {
            index = 0;
        }

        this.state.set({
            navigationIndex: index
        });

        return false;
    },

    onArrowLeft: function() {
        var length = this.getNavigationItems().length;
        var index = this.state.current.navigationIndex > 0 ? 1 : 0;

        if (index >= length) {
            index = 0;
        }

        this.state.set({
            navigationIndex: index
        });
    },

    onArrowRight: function() {
        var itemsLength = this.getNavigationItems().length;
        var productsLength = this.getNavigationProducts().length;
        var index = this.state.current.navigationIndex > 0 ? itemsLength - productsLength : 0;

        this.state.set({
            navigationIndex: index
        });
    },

    updateVisibility: function() {
        if (this.state.current.visible) {
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

    setQuery: function(query) {
        this.$input.val(query);
    },

    toggleHintVisibility: function(show) {
        this.$inputHint.toggleClass('is-hidden', !show);
    },

    updateHint: function() {
        this.$inputHint.val(this.formatHint());
    },

    updateSuggestions: function() {
        this.$panel.html(this.state.current.suggestions);
    },

    updateNavigation: function() {
        this.getNavigationItems()
            .removeClass('is-active')
            .eq(this.state.current.navigationIndex)
            .addClass('is-active');
    },

    formatHint: function() {
        var query = this.state.current.query;
        var hint = this.state.current.hint;

        if (hint && hint.toLowerCase().indexOf(query.toLowerCase()) === 0) {
            return query + hint.slice(query.length);
        }

        return '';
    }
};
