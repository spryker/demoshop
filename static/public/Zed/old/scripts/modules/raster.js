zed.modules.raster = {
    init : function() {
        $('#raster .block, #raster .row').each(function(key) {
            $(this).data('index', key);
        });
        $('#raster > .block, #raster .row').each(function(key) {
            $(this).attr('data-index-main', key);
        });
        $('#raster .row > .block').each(function(key) {
            $(this).attr('data-index-sub', key);
        });

        $('#raster .block').mousedown(this.actions.mousedown);
        $(document).mouseup(this.actions.mouseup);

        this.config.init();
        this.updater.init();
    },
    config : {
        vars : {},
        init : function() {
            var config = this.load();
            var somethingChanged = false;
            $.each(config.main, function(key, value) {
                var target = $('#raster > .block, #raster .row').eq(key);
                var source = $('#raster [data-index-main=' + value + ']');
                if (target.attr('data-index-main') === source.attr('data-index-main')) {
                    return;
                }
                somethingChanged = true;
                target.before(source);
            });
            $.each(config.sub, function(key, value) {
                var target = $('#raster .row > .block').eq(key);
                var source = $('#raster [data-index-sub=' + value + ']');
                if (target.attr('data-index-sub') === source.attr('data-index-sub')) {
                    return;
                }
                somethingChanged = true;
                target.before(source);
            });
            if (somethingChanged) { $('#resetRaster').show(); }
        },
        load : function() {
            var config = zed.modules.config.get('raster');
            var pageParams = zed.vars.exchange.page.current;
            this.identifier = pageParams.module + '.' + pageParams.controller + '.' + pageParams.action;
            if (!config[this.identifier]) { config = {}; }
            else { config = config[this.identifier]; }
            if (!config.main) { config.main = {}; }
            if (!config.sub) { config.sub = {}; }
            return config;
        },
        save : function(config) {
            var rasterConfig = zed.modules.config.get('raster');
            rasterConfig[this.identifier] = config;
            zed.modules.config.set('raster', rasterConfig);
        },
        update : function() {
            var config = this.load();
            var somethingChanged = false;
            config.main = {}; config.sub = {};
            $('#raster > .block, #raster .row').each(function(key) {
                if (parseInt($(this).attr('data-index-main')) !== key) {
                    config.main[key] = $(this).attr('data-index-main');
                    somethingChanged = true;
                }
            });
            $('#raster .row > .block').each(function(key) {
                if (parseInt($(this).attr('data-index-sub')) !== key) {
                    config.sub[key] = $(this).attr('data-index-sub');
                    somethingChanged = true;
                }
            });
            if (somethingChanged) { $('#resetRaster').fadeIn(300); }
            else { $('#resetRaster').hide(); }
            this.save(config);
        }
    },
    actions : {
        vars : {
            el : null,
            elX : null,
            elY : null,
            shadow : null,
            dragging : false,
            originX : 0,
            originY : 0,
            newX : 0,
            newY : 0,
            targets : null,
            lastTarget : null
        },
        mousedown : function(event) {
            zed.modules.raster.actions.vars.el = $(this);
            zed.modules.raster.actions.vars.originX = event.screenX;
            zed.modules.raster.actions.vars.originY = event.screenY;
            $(document).unbind('mousemove', zed.modules.raster.actions.mousemove).mousemove(zed.modules.raster.actions.mousemove);
        },
        mouseup : function() {
            if (zed.modules.raster.actions.vars.dragging) {
                zed.modules.raster.actions.drop();
            }
            $(document).unbind('mousemove', zed.modules.raster.actions.mousemove);
            zed.modules.raster.actions.vars.el = null;
        },
        mousemove : function(event) {
            zed.modules.raster.actions.vars.newX = event.screenX;
            zed.modules.raster.actions.vars.newY = event.screenY;
            if (!zed.modules.raster.actions.vars.dragging && (Math.abs(event.screenX - zed.modules.raster.actions.vars.originX) > 10 || Math.abs(event.screenY - zed.modules.raster.actions.vars.originY) > 10)) {
                zed.modules.raster.actions.startDrag();
                return;
            }
            if (!zed.modules.raster.actions.vars.dragging) { return; }
            zed.modules.raster.actions.drag();
        },
        startDrag : function() {
            this.vars.dragging = true;
            this.vars.targets = '#raster .' + this.vars.el.attr('class').split(' ').join('.') + '[data-index-' + this.determineLayer(this.vars.el) + ']';
            if (this.vars.el.hasClass('full')) { this.vars.targets += ', #raster .row'; }
            this.vars.targets = $(this.vars.targets);
            $('#raster .block.old').remove();
            this.vars.shadow = this.vars.el.clone().addClass('old').css({ width : this.vars.el.width() });
            this.vars.elX = this.vars.el.offset().left;
            this.vars.elY = this.vars.el.offset().top;
            this.vars.el.addClass('new');
            $('#raster').append(this.vars.shadow);
            this.drag();
        },
        drag : function() {
            this.vars.shadow.css({ left : this.vars.elX - (this.vars.originX - this.vars.newX ), top : this.vars.elY - (this.vars.originY - this.vars.newY ) });
            var target = this.determineTarget();
            if (target.data('index') === this.vars.lastTarget) { return; }
            if (target.hasClass('new')) {
                this.vars.lastTarget = target.data('index');
                return;
            }
            if (target.siblings('.new').length) {
                if (target.index() > this.vars.el.index()) {
                    target.after(this.vars.el);
                } else {
                    target.before(this.vars.el);
                }
            } else {
                target.before(this.vars.el);
            }
            this.vars.lastTarget = target.data('index');
        },
        drop : function() {
            this.vars.dragging = false;
            this.vars.el.removeClass('new');
            this.vars.shadow.remove();
            zed.modules.raster.config.update();
        },
        determineTarget : function() {
            var centerX = this.vars.shadow.offset().left + Math.round(this.vars.el.outerWidth(false) / 2);
            var centerY = this.vars.shadow.offset().top + Math.round(this.vars.el.outerHeight(false) / 2);
            var result = this.vars.el;
            this.vars.targets.each(function() {
                var boundaries = [$(this).offset().left, $(this).offset().top, $(this).offset().left + $(this).outerWidth(false), $(this).offset().top + $(this).outerHeight(false)];
                if (centerX >= boundaries[0] && centerX <= boundaries[2] && centerY >= boundaries[1] && centerY <= boundaries[3]) {
                    result = $(this);
                }
            });
            return result;
        },
        determineLayer : function($el) {
            if ($el.attr('data-index-main') !== undefined) { return 'main'; }
            if ($el.attr('data-index-sub') !== undefined) { return 'sub'; }
            return 'none';
        }
    },
    updater : {
        vars : {
            resources : null
        },
        init : function() {
            if (!$('#raster [data-update-resource]').length) { return; }
            this.vars.resources = this.collectResources();
            if (!this.vars.resources.length) { return; }
            window.setInterval(this.apply, 60000);
        },
        apply : function() {
            var resources = zed.modules.raster.updater.vars.resources;
            $.each(resources, function(key, url) {
                $.ajax({
                    type : 'get',
                    url : url,
                    dataType : 'json',
                    success : function(response) {
                        if (response.status !== 'success') { return; }
                        $.each(response.data, function(id, value) {
                            var el = $('#raster [data-update-resource="' + url + '"][data-update-id="' + id + '"][data-update-target]');
                            var target = el.find('.' + el.data('updateTarget'));
                            if (!el.length || !target.length || target.text() == value) { return; }
                            target.fadeOut(400, function() {
                                $(this).html(value).fadeIn(400);
                            });
                        });
                    }
                });
            });
        },
        collectResources : function() {
            var resources = [];
            $('#raster [data-update-resource]').each(function() {
                if ($.inArray($(this).data('updateResource'), resources) === -1) {
                    resources.push($(this).data('updateResource'));
                }
            });
            return resources;
        }
    }
}

zed.modules.plugins.push('raster');