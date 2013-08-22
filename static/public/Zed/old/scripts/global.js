var zed = {
    vars : {
        workspace : {
            contentHeight : 2000
        },
        exchange : {
            page : {
                current : {}
            }
        }
    },
    actions : {
        init : function() {
            zed.actions.workspace.init();
            zed.modules.init();
        },
        workspace : {
            init : function() {
                zed.actions.workspace.event(zed.actions.workspace.update);
                $('section > header > nav a').removeAttr('title');
                $('header nav li > ul').parent().addClass('hasChildren');
            },
            event : function(func) {
                func();
                window.setTimeout(func, 50);
                window.setTimeout(func, 100);
                window.setTimeout(func, 500);
                $(window).unbind('resize', func).resize(func);
                $(document).unbind('scroll', func).scroll(func);
            },
            update : function() {
                var $header = $('section > header');
                zed.vars.workspace.contentHeight = $(window).height() - ($('section').outerHeight(false) - $('section').height());
                $('#content').css({minHeight : zed.vars.workspace.contentHeight});
                $.each(zed.actions.workspace.updatePlugins, function() {
                    this();
                });
            },
            updatePlugins : []
        }
    },
    modules : {
        init : function() {
            this.config.init();
            this.notification.init();
            this.tray.init();
            this.bookmarks.init();
            this.grids.init();
            this.search.init();
            this.accessibility.init();
            this.documentation.init();
            this.keyboard.init();
            this.viewport.init();
            this.forms.init();
            $.each(this.plugins, function() {
                zed.modules[this].init();
            });
        },
        plugins : []
    }
};

$(document).ready(zed.actions.init);