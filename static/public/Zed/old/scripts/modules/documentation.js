zed.modules.documentation = {
    vars : {
        newContent : null
    },
    init : function() {
        if (!$('#documentation').length || $('#content #main aside').hasClass('empty')) {
            return;
        }
        zed.modules.documentation.setPageEnableFlag();
        $('nav.global.next').show().click(function() {
            $('#content #main aside').toggleClass('expanded');
            zed.modules.documentation.setPageEnableFlag($('#content #main aside').hasClass('expanded'));
            $(this).toggleClass('revert');
            zed.actions.workspace.update();
        });
        $('#content #main .dcontainer').click(function(event) {
            event.stopPropagation();
            if (!$(this).hasClass('editing')) {
                $(this).addClass('editing');
                $(this).children('textarea').focus();
            }
        });
        $('#content #main .dcontainer textarea').change(function() {
            zed.modules.documentation.vars.newContent = $(this).val();
        });
        $(document).click(function() {
            if (!zed.modules.documentation.vars.newContent) {
                $('#content #main .dcontainer').removeClass('editing');
                return;
            }
            $.ajax({
                type : 'post',
                url : '/documentation/index/save',
                dataType : 'json',
                data : {
                    dmodule : zed.vars.exchange.page.current.module,
                    dcontroller : zed.vars.exchange.page.current.controller,
                    daction : zed.vars.exchange.page.current.action,
                    dcontent : zed.modules.documentation.vars.newContent
                },
                success : function(response) {
                    zed.modules.documentation.vars.newContent = null;
                    if (response.result !== 'success') {
                        return;
                    }
                    $('#content #main .dcontainer').removeClass('editing');
                    zed.modules.documentation.load();
                }
            });
        });
        this.loadStatic();
        var css = 'ease-in-out right .3s, ease-in-out box-shadow .3s';
        $('#documentation').css('-moz-transition', css).css('-webkit-transition', css).css('transition', css);
        css = 'ease-in-out right .3s, ease-in-out background-color .3s';
        $('nav.global.next').css('-moz-transition', css).css('-webkit-transition', css).css('transition', css);
    },
    setPageEnableFlag : function(state) {
        // dependency to config module
        var config = zed.modules.config.get('documentation') || {};
        if (!config.enabled) { config.enabled = {}; }
        if (typeof state === 'undefined') { zed.modules.config.set('documentation', config); return; }
        var page = zed.vars.exchange.page.current;
        config.enabled[page.module + ',' + page.controller + ',' + page.action] = state;
        zed.modules.config.set('documentation', config);
    },
    load : function() {
        $.ajax({
            type : 'post',
            url : '/documentation/index/view',
            dataType : 'json',
            data : {
                dmodule : zed.vars.exchange.page.current.module,
                dcontroller : zed.vars.exchange.page.current.controller,
                daction : zed.vars.exchange.page.current.action
            },
            success : function(response) {
                if (!response || response.revision === 0) {
                    return;
                }
                zed.modules.documentation.show(response.content, response.revision, response.author, response.created);
            }
        });
    },
    loadStatic : function() {
        var loaded = zed.modules.documentation.vars.loaded;
        if (!loaded) {
            return;
        }
        var page = zed.vars.exchange.page.current;
        var show = zed.modules.config.get('documentation').enabled[page.module + ',' + page.controller + ',' + page.action];
        if (typeof show === 'undefined') { show = true; }
        zed.modules.documentation.show(loaded.content, loaded.revision, loaded.author, loaded.created_at, !show);
    },
    show : function(content, revision, author, created, justRender) {
        $('#documentation .output').html(content).find('a').unbind('click').click(function(event) {
            event.stopPropagation();
        });
        $('#documentation textarea').val(content);
        $('#documentation .revision').html(revision);
        $('#documentation .author').html(author);
        $('#documentation .created').html(created);
        if (!justRender) {
            $('#documentation').addClass('expanded');
            $('nav.global.next').removeClass('revert');
        }
        zed.actions.workspace.update();
    },
    textarea : {
        $el : function() {
            return $('#documentation textarea');
        },
        selectionRange : function() {
            var el = this.$el().get(0);
            if (!el) { return [0, 0]; }
            if (typeof el.selectionStart === 'undefined' || typeof el.selectionEnd === 'undefined') {
                return [this.$el().val().length-1, this.$el().val().length-1];
            }
            return [el.selectionStart, el.selectionEnd];
        },
        assembleText : function(insertion) {
            var selectionRange = this.selectionRange();
            return this.$el().val().substr(0, selectionRange[0]) + insertion + this.$el().val().substr(selectionRange[1]);
        },
        bold : function() {
            var insertion = prompt('Text to be inserted:');
            if (insertion === null) { return; }
            insertion = '<strong>' + insertion + '</strong>';
            this.$el().val(this.assembleText(insertion)).change().focus();
        },
        italic : function() {
            var insertion = prompt('Text to be inserted:');
            if (insertion === null) { return; }
            insertion = '<i>' + insertion + '</i>';
            this.$el().val(this.assembleText(insertion)).change().focus();
        },
        spacer : function() {
            this.$el().val(this.assembleText('<hr />')).change().focus();
        },
        list : function() {
            var insertion = prompt('Text to be inserted:');
            if (insertion === null) { return; }
            insertion = "<ul>\n<li>" + insertion + "</li>\n</ul>\n";
            this.$el().val(this.assembleText(insertion)).change().focus();
        },
        br : function() {
            this.$el().val(this.assembleText("<br />\n")).change().focus();
        }
    }
};

zed.actions.workspace.updatePlugins.push(function() {
    if (!$('#content #main aside.expanded').length) {
        return;
    }
    var mainOffset = $('#main').offset().top;
    var offset = mainOffset - $(document).scrollTop() + 20;
    if (offset < $('section > header').outerHeight(false) + 20) { offset = $('section > header').outerHeight(false) + 20; }
    $('#content #main aside').css({ top : offset })
    .children('.dcontainer').css({ height : $('#content #main aside .dcontainer').parent().height() })
    .children('.output').css({ height : $('#content #main aside .dcontainer').parent().height() });
    var arrowMargin = Math.round((offset - mainOffset - 20) / 2) + 50;
    $('nav.global.next').css({ marginTop : arrowMargin });
    var $textarea = $('#content #main aside textarea');
    $textarea.css({ height : $textarea.parent().height() - ($textarea.siblings('.formatting').outerHeight(true) + $textarea.siblings('.history').outerHeight(true) + 16) });
});