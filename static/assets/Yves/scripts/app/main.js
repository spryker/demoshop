var app = {
    vars : {},
    init : function() {
        this.slider.init();
        this.viewport.init();
        for (var i in this.additionals) {
            if (this[this.additionals[i]]) {
                this[this.additionals[i]].init();
            }
        }
        $(document).keyup(function(e) {
            if (e.keyCode !== 160) {
                return;
            }
            $('body').toggleClass('showHardcoded');
        });
        this.tooltip.init();
    },
    additionals : [],
    viewport : {
        init : function() {
            var $window = $(window);
            $window.resize(this.adapt.bind(this));
            $window.resize(this.footer.bind(this));
            $window.trigger('resize');
        },
        sizeRange : [605, 1150],
        currentSize : 1150,
        adapt : function() {
            var currentWidth = $(window).width();
            if (currentWidth >= this.sizeRange[1] && this.currentSize === this.sizeRange[1]) {
                return;
            }
            this.currentSize = (currentWidth > this.sizeRange[1]
                ? this.sizeRange[1]
                : (currentWidth < this.sizeRange[0]
                ? this.sizeRange[0]
                : currentWidth));
            $('section').css({ width: this.currentSize - 40 });
            $('section.fullWidth').css({ width: this.currentSize });
            this.plugins.bind(app)(this.currentSize);
        },
        footer : function() {
            var $main = $('.consumeHeight');
            if (!$main.length) { return; }

            var paddingHeight = $main.outerHeight(false) - $main.height();

            var consumedHeight = 0;
            $main.siblings(':visible').each(function() {
                consumedHeight += $(this).outerHeight(true);
            });

            $main.css({ minHeight : ($(window).height() - consumedHeight) - paddingHeight});
        },
        plugins : function(newSize) {
            this.slider.adaptWidth(newSize - 40);
        }
    },
    slider : {
        init : function() {
            this.$slider = $('#teaser ul');
            if (!this.$slider.length) { return; }
            this.max = this.$slider.children('li').length - 1;
            this.index = 0;
            this.adaptWidth(app.viewport.currentSize);
            setTimeout(this.slide.bind(this), 6000);
        },
        adaptWidth : function(newSize) {
            this.slideWidth = newSize;
            this.$slider.css({ width : (this.max + 1) * newSize, marginLeft : this.index * newSize * (-1) })
                .children('li').css({ width : newSize });
        },
        slide : function() {
            this.index = this.index < this.max ? this.index + 1 : 0;
            this.$slider.animate({ marginLeft : this.index * this.slideWidth * (-1) }, 1000);
            setTimeout(this.slide.bind(this), 6000);
        }
    },
    settings : {
        get : function(property) {
            if (typeof localStorage === 'undefined') {
                return {};
            }
            var settings = localStorage.getItem('settings');
            if (!settings) {
                localStorage.setItem('settings', '{}');
                return this.get();
            }

            settings = $.parseJSON(settings);
            if (property) {
                return settings[property];
            }
            return settings;
        },
        set : function(property, value) {
            if (typeof localStorage === 'undefined') {
                return {};
            }
            var settings = this.get();
            settings[property] = value;
            localStorage.setItem('settings', JSON.stringify(settings));
            return settings;
        }
    },
    tooltip : {
        init : function() {
            $('[data-hover-tooltip]').mouseenter(function() {
                if ($(this).next('.tooltip').length) { return; }
                app.tooltip.attachTo($(this), 'info', $(this).data('hover-tooltip'), true, true);
                $(this).mouseleave(function() {
                    $(this).next('.tooltip').mouseleave();
                });
            });
        },
        attachTo : function($target, type, message, detachOnHover, disableDetachAnimation) {
            var $tooltip = this.$generate(type, message);
            $target.after($tooltip.css({
                left : $target.position().left + ($target.outerWidth(true) / 2),
                top : $target.position().top + $target.outerHeight(true) + 6
            }));

            var halfWidth = $tooltip.outerWidth(false) / 2;
            $tooltip.css({ marginLeft : halfWidth * (-1) });

            if (detachOnHover) {
                $tooltip.mouseleave(function() {
                    if (!disableDetachAnimation) {
                        $(this).fadeOut(500, function() {
                            $(this).remove();
                        });
                    } else {
                        $(this).remove();
                    }
                });
            }

            return $tooltip;
        },
        $generate : function(type, message) {
            return $('<div class="tooltip"></div>').addClass(type).html(message);
        }
    },
    ensureVisibility : function($target) {
        var elementOffset = $target.offset().top;
        var windowScrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();
        var isVisible = (windowScrollTop + windowHeight > elementOffset + 30 && elementOffset - 30 > $(window).scrollTop());
        if (!isVisible) {
            $('html, body').animate({ scrollTop : Math.round(elementOffset - (windowHeight / 2)) }, 500);
        }
        return isVisible;
    },
    validation : {
        apply : function ($container, childrenOnly) {
            var result = this.check($container, childrenOnly);
            $container[childrenOnly ? 'children' : 'find'](':input[name]')
                .removeClass('validationError');
            this.getInvalidItems(result)
                .addClass('validationError');
            var $firstInvalid = this.getInvalidItems(result, true).eq(0);
            if ($firstInvalid.length) {
                var firstInvalidResult = result[$firstInvalid.attr('name')].check;
                var message = 'validation-message-' + firstInvalidResult;
                var $msgEl = $firstInvalid.parent('[data-validation-message]');
                if ($firstInvalid.data('validation-message')) {
                    message = $firstInvalid.data('validation-message');
                } else {
                    if ($msgEl.length) {
                        message = $msgEl.data('validationMessage');
                    } else {
                        message = $('#validationMessages').data(message);
                    }
                }
                if (firstInvalidResult === 'pattern' && $firstInvalid.data('validation-pattern-message')) {
                    message = $firstInvalid.data('validation-pattern-message');
                }
                $('.tooltip').remove();
                app.ensureVisibility(app.tooltip.attachTo($msgEl.length ? $msgEl : $firstInvalid, 'error', message, true));
            }
            return result;
        },
        resultIsValid : function (result) {
            var valid = true;
            $.each(result, function (index, el) {
                if (!el.valid) {
                    valid = false;
                }
            });
            return valid;
        },
        getInvalidItems : function (result, firstOnly) {
            var names = [];
            $.each(result, function (index, el) {
                if (!el.valid && !(firstOnly && names.length)) {
                    names.push(index);
                }
            });
            var selector =
                names
                    .map(function (item) {
                        return '[name="' + item + '"]';
                    })
                    .join(', ');
            return $(selector);
        },
        check : function ($container, childrenOnly) {
            var result = {};
            var formValues = {};
            var serializedForm =
                $container
                    .closest('form')
                    .serializeArray();

            $.each(serializedForm, function (index, el) {
                formValues[ el.name ] = el.value;
            });
            $.each($container.find('[data-validator-precondition]'), function (index, el) {
                var $el = $(el);

                var preconditionFunction = new Function($el.data('validatorPrecondition'));

                if (!preconditionFunction()) {
                    $el.attr('data-validator-prevent', true);
                } else {
                    $el.removeAttr('data-validator-prevent');
                }
            });
            var $notPreventedInputs =
                $container[childrenOnly ? 'children' : 'find'](':input[name]')
                    .not('[data-validator-prevent] :input');
            $notPreventedInputs.each(function (index, el) {
                var $el = $(el);
                var currentName = $el.attr('name');
                result[ currentName ] = {
                    valid : true,
                    check : 'none'
                };
                if ($el.is('[required]')) {
                    result[ currentName ] = {
                        valid : !!formValues[currentName],
                        check : 'required'
                    };
                }
                if (!result[currentName].valid) {
                    // continue
                    return;
                }
                if ($el.is('[type=email]')) {
                    result[currentName] = {
                        valid : /[A-Z0-9._%a-z\-\+]+?@(?:[A-Z0-9a-z\-]+\.)+?[A-Za-z]{2,4}/.test(formValues[currentName]),
                        check : 'email'
                    };
                }
                if (!result[currentName].valid) {
                    // continue
                    return;
                }
                if ($el.is('[pattern]')) {
                    result[currentName] = {
                        valid : RegExp($el.attr('pattern')).test(formValues[currentName]),
                        check : 'pattern'
                    };
                }
                // implement more checks here if necessary
            });

            return result;
        }
    }
};

$(app.init.bind(app));