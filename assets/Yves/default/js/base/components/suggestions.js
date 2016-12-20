'use strict';

var $ = require('jquery');

var threshold = 2;
var fetchUrl = '/search/suggest';

var keyboardCodes = {
    9: 'tab',
    13: 'enter',
    38: 'arrowUp',
    40: 'arrowDown',
    37: 'arrowLeft',
    39: 'arrowRight'
};

var Suggestions = {
    name: 'suggestions',

    state: {
        query: '',
        hint: '',
        suggestions: '',
        navigationCurrentIndex: 0,
        visible: false
    },

    init: function() {
        this.initElements();
        this.mapEvents();
    },

    initElements: function() {
        var that = this;

        this.elements = {
            $input: $('.js-input', this.$root),
            $inputShadow: $('.js-input-shadow', this.$root),
            $panel: $('.js-panel', this.$root),

            getNavigationItems: function() {
                return $('.js-navigable', that.$root);
            },

            getNavigationActiveItem: function() {
                return $('.js-navigable.is-active', that.$root);
            },

            getNavigationProducts: function() {
                return $('.js-navigable.js-product', this.$panel);
            }
        };
    },

    mapEvents: function() {
        this.elements.$input
            .on('click', this.onClick.bind(this))
            .on('keydown', this.onTyping.bind(this))
            .on('keyup', this.onTyped.bind(this))
            .on('focus', this.onFocus.bind(this))
            .on('blur', this.onBlur.bind(this));
    },

    onClick: function() {
        this.changeState({
            navigationCurrentIndex: 0
        });
    },

    onTyping: function(e) {
        var code = e.keyCode || e.which;

        switch (keyboardCodes[code]) {
            case 'tab': return this.onTab();
            case 'enter': return this.onEnter();
            case 'arrowUp':return this.onArrowUp();
            case 'arrowDown': return this.onArrowDown();
            case 'arrowLeft': return this.onArrowLeft();
            case 'arrowRight': return this.onArrowRight();
        }
    },

    onTyped: function() {
        var query = this.elements.$input.val() || '';

        this.changeState({
            query: query.trim()
        });
    },

    onFocus: function() {
        this.changeState({
            visible: true
        });
    },

    onBlur: function() {
        this.changeState({
            visible: false
        });
    },

    onTab: function() {
        this.updateInput(this.state.hint);
        return false;
    },

    onEnter: function() {
        var href = this.elements.getNavigationActiveItem()
            .closest('a')
            .attr('href');

        if (href) {
            window.location.href = href;
            return false;
        }
    },

    onArrowUp: function() {
        var index = this.state.navigationCurrentIndex - 1;

        if (index < 0) {
            index = 0;
        }

        this.changeState({
            navigationCurrentIndex: index
        });

        return false;
    },

    onArrowDown: function() {
        var length = this.elements.getNavigationItems().length;
        var index = this.state.navigationCurrentIndex + 1;

        if (index >= length) {
            index = 0;
        }

        this.changeState({
            navigationCurrentIndex: index
        });

        return false;
    },

    onArrowLeft: function() {
        var length = this.elements.getNavigationItems().length;
        var index = this.state.navigationCurrentIndex > 0 ? 1 : 0;

        if (index >= length) {
            index = 0;
        }

        this.changeState({
            navigationCurrentIndex: index
        });
    },

    onArrowRight: function() {
        var itemsLength = this.elements.getNavigationItems().length;
        var productsLength = this.elements.getNavigationProducts().length;
        var index = this.state.navigationCurrentIndex > 0 ? itemsLength - productsLength : 0;

        this.changeState({
            navigationCurrentIndex: index
        });
    },

    onChangeState: function(changes) {
        if (changes.query) {
            if (this.state.query.length >= threshold) {
                if (this.isQueryInlineWithHint()) {
                    this.updateHint();
                } else {
                    this.fetchRemoteData();
                }
            } else {
                this.resetData();
            }
        }

        if (changes.hint) {
            this.updateHint();
        }

        if (changes.suggestions) {
            this.updateSuggestions();
        }

        if (changes.navigationCurrentIndex) {
            this.updateNavigation();
        }

        if (changes.visible) {
           this.updateVisibility();
        }
    },

    fetchRemoteData: function() {
        var that = this;

        that.changeState({
            hint: ''
        });

        $.get(fetchUrl, { q: that.state.query }, function(data) {
            that.changeState({
                hint: data.completion,
                suggestions: data.suggestion,
                navigationCurrentIndex: 0
            });
        });
    },

    resetData: function() {
        this.changeState({
            hint: '',
            suggestions: '',
            navigationCurrentIndex: 0
        });
    },

    isQueryInlineWithHint: function() {
        var length = this.state.query.length;
        var index = length - 1;

        return length >= threshold
            && this.state.hint
            && this.state.hint.length >= index
            && this.state.hint[index] === this.state.query[index];
    },

    formatHint: function() {
        var query = this.state.query;
        var hint = this.state.hint;
        var value = query;

        if (hint) {
            value += hint.slice(query.length);
        }

        return value;
    },

    updateVisibility: function() {
        if (this.state.visible) {
            return this.elements.$panel
                .stop()
                .removeClass('is-hidden');
        }

        this.elements.$panel
            .delay(500)
            .queue(function(next) {
                $(this).addClass('is-hidden');
                next();
            });
    },

    updateInput: function(value) {
        this.elements.$input.val(value);
    },

    updateHint: function() {
        this.elements.$inputShadow.val(this.formatHint());
    },

    updateSuggestions: function() {
        this.elements.$panel.html(this.state.suggestions);
    },

    updateNavigation: function() {
        this.elements.getNavigationItems()
            .removeClass('is-active')
            .eq(this.state.navigationCurrentIndex)
            .addClass('is-active');
    }

};

module.exports = Suggestions;
