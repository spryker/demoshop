app.catalog = {
    init : function() {
      this.rangeSlider.init();
      this.zoom.init();
    },
    zoom : {
        vars : {
            elClass : 'zoom',
            currentClass : '#product .pictures .current',
            originalSize : 1008
        },
        init : function() {
            var vars = this.vars;
            $(vars.currentClass).mouseenter(function() {
                $('.' + vars.elClass).remove();
                var bgImgCss = 'url(' + $(this).children('img').attr('src') + ')';
                vars.$zoom = $('<div class="' + vars.elClass + '"></div>').css({ backgroundImage : bgImgCss });
                $(this).append(vars.$zoom);
            });

            $(vars.currentClass).mousemove(function(e) {
                var coords = this.getBoundingClientRect();
                if (coords.left > e.clientX || coords.right < e.clientX || coords.top > e.clientY || coords.bottom < e.clientY) {
                    vars.$zoom.remove();
                    return;
                }
                var factor = vars.originalSize / (coords.width - 2);
                var bgpos = (((coords.left - e.clientX) * factor) + 100) + 'px ' + (((coords.top - e.clientY) * factor) + 100) + 'px';
                vars.$zoom.css({ left : e.clientX - 100, top : e.clientY - 100, backgroundPosition : bgpos });
            });

            $(vars.currentClass).mouseleave(function() {
                vars.$zoom.remove();
            });

            $('.filters input[type=checkbox][data-on][data-off]').change(function() {
                var url = $(this).is(':checked') ? $(this).data('on') : $(this).data('off');
                document.location.href = url;
            });
            $('.filters option[data-on][data-off]').parent().change(function() {
                console.log($(this).val());
                //var url = $(this).is(':checked') ? $(this).data('on') : $(this).data('off');
                //document.location.href = url;
            });
        }
    },
    rangeSlider : {
        init : function() {
            var $targets = $('.rangeSlider.max');
            $targets.each(function() {
                var rangeSlider = app.catalog.rangeSlider;
                var $container = $('<div class="rangeSliderContainer"></div>')
                    .data({ min : parseInt($(this).prev('.min').attr('min')), max : parseInt($(this).attr('max')) });
                var $min = $('<div class="min"></div>');
                var $max = $('<div class="max"></div>');
                var $range = $('<div class="range"></div>');
                $container.append($min).append($max).append($range);
                $(this).after($container);
                rangeSlider.adjust($container);
                $min.mousedown(rangeSlider.down);
                $max.mousedown(rangeSlider.down);
            });

            this.initConnectors();
        },
        initConnectors : function() {
            var rangeSlider = this;
            $('.rangeSliderConnector').bind('input paste', function() {
                var value = $(this).val().replace(/[^\d]/, '');
                $(this).val(value);
                var type = $(this).hasClass('min') ? 'min' : 'max';
                rangeSlider.tmpConfig.type = type;
                var $container = (type === 'min' ? $(this).prev() : $(this).prev().prev());
                var config = rangeSlider.getConfig($container);
                if (isNaN(parseInt(value)) || parseInt(value) < config.min) {
                    return;
                }
                var $el = rangeSlider['$get' + (type === 'min' ? 'Min' : 'Max')]($container);
                $el.val(parseInt(value));
                rangeSlider.adjust($container);
            }).change(function() {
                var type = $(this).hasClass('min') ? 'min' : 'max';
                var $container = (type === 'min' ? $(this).prev() : $(this).prev().prev());
                rangeSlider.apply($container);
            });
        },
        getConfig : function($container) {
            var config = {
                min : $container.data('min'),
                max : $container.data('max'),
                minVal : parseInt(this.$getMin($container).val()),
                maxVal : parseInt(this.$getMax($container).val())
            };
            config = this.tweakMinMax(config);
            config.minPerc = ((config.minVal - config.min) / (config.max - config.min)) * 100;
            config.maxPerc = ((config.maxVal - config.min) / (config.max - config.min)) * 100;

            return config;
        },
        tweakMinMax : function(config) {
            var currentType = this.tmpConfig.type;
            var twoPercent = Math.ceil(((config.max - config.min) / 100) * 2);
            if (currentType) {
                if (currentType === 'min' && config.minVal + twoPercent > config.maxVal) {
                    config.maxVal = config.minVal;
                    if (config.maxVal + twoPercent <= config.max) {
                        config.maxVal += twoPercent;
                    } else {
                        config.maxVal = config.max;
                    }
                }
                if (currentType === 'max' && config.maxVal - twoPercent < config.minVal) {
                    config.minVal = config.maxVal;
                    if (config.minVal - twoPercent >= config.min) {
                        config.minVal -= twoPercent;
                    } else {
                        config.minVal = config.min;
                    }
                }
            }
            return config;
        },
        getValueForPerc : function(perc, round, config) {
            if (!config) {
                config = this.getConfig(this.tmpConfig.$el.parent());
            }
            var value = (((config.max - config.min) / 100) * perc) + config.min;
            if (round) { value = Math.round(value); }
            return value;
        },
        adjust : function($container, config) {
            if (!config) {
                config = this.getConfig($container);
            }
            $container.children('.min').css({ left : config.minPerc + '%' });
            $container.children('.max').css({ left : config.maxPerc + '%' });
            $container.children('.range').css({ left : config.minPerc + '%', width : (config.maxPerc - config.minPerc) + '%' });

            this.$getMaxConnector($container).val(config.maxVal);
            this.$getMinConnector($container).val(config.minVal);
        },
        tmpConfig : {
            $el : $(),
            type : null,
            cursorRange : [null, null],
            perc : null
        },
        getCursorPosPerc : function(currentX) {
            var config = this.tmpConfig;
            var perc = ((currentX - config.cursorRange[0]) / (config.cursorRange[1] - config.cursorRange[0])) * 100;
            return perc > 100 ? 100 : (perc < 0 ? 0 : perc);
        },
        down : function(e) {
            e.preventDefault();
            var rangeSlider = app.catalog.rangeSlider;
            rangeSlider.tmpConfig.$el = $(this);
            rangeSlider.tmpConfig.type = rangeSlider.tmpConfig.$el.hasClass('min') ? 'min' : 'max';
            var $container = rangeSlider.tmpConfig.$el.parent();
            var rect = $container.get(0).getBoundingClientRect();
            rangeSlider.tmpConfig.cursorRange = [rect.left, rect.right];
            $(document).mousemove(rangeSlider.move).mouseup(rangeSlider.up);
        },
        move : function(e) {
            var rangeSlider = app.catalog.rangeSlider;
            var $container = rangeSlider.tmpConfig.$el.parent();
            var perc = rangeSlider.getCursorPosPerc(e.clientX);
            var newValue = rangeSlider.getValueForPerc(perc, true);
            var $target = rangeSlider.tmpConfig.type === 'min' ? rangeSlider.$getMin($container) : rangeSlider.$getMax($container);
            $target.val(newValue);
            rangeSlider.adjust($container);
        },
        up : function() {
            var rangeSlider = app.catalog.rangeSlider;
            $(this).unbind('mousemove', rangeSlider.move)
                .unbind('mouseup', rangeSlider.up);
            rangeSlider.apply(rangeSlider.tmpConfig.$el.parent());
            rangeSlider.tmpConfig = {
                $el : $(),
                type : null,
                cursorRange : [null, null],
                perc : null
            };
        },
        apply : function($container) {
            var config = this.getConfig($container);
            this.$getMin($container).val(config.minVal);
            this.$getMax($container).val(config.maxVal);
            console.log('applying config', config);
        },
        $getMin : function($container) {
            return $container.prev().prev();
        },
        $getMax : function($container) {
            return $container.prev();
        },
        $getMinConnector : function($container) {
            return $container.siblings($container.prev().prev().data('connector'))
        },
        $getMaxConnector : function($container) {
            return $container.siblings($container.prev().data('connector'))
        }
    }
}

app.additionals.push('catalog');