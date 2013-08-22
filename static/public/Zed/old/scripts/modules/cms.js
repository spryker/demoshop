$(document).ready(function(){
    if ($('.code').length) {

        var AceHelper = {
            editors: {},
            init: function() {
                $.ajaxSetup({async: false});
                jQuery.getScript('/scripts/ace-0.2.0/theme-textmate.js');

                $('.code').each(function(){
                    if ($(this).data('type')) {
                        jQuery.getScript('/scripts/ace-0.2.0/mode-'+$(this).data('type')+'.js');

                        $('#'+$(this).attr('id')+'-preview').hide();
                        $(this).hide();

                        editor = ace.edit($(this).attr('id')+'-code');
                        editor.setTheme('ace/theme/textmate');

                        mode = require('ace/mode/'+$(this).data('type')).Mode;
                        editor.getSession().setMode(new mode());
                        editor.getSession().setValue($(this).val());

                        AceHelper.editors[$(this).attr('id')] = {'textarea':$(this), 'editor': editor};
                    }
                });

                $('.cms-editor-toptabs .source').click(function(){
                    AceHelper.switchToSource($(this));
                });
                $('.cms-editor-toptabs .edit').click(function(){
                    AceHelper.switchToEditor($(this));
                });

                $('form.code').submit(function(){
                    AceHelper.submit();
                });

                $(window).resize(function(){
                    AceHelper.redraw();
                });

                $.ajaxSetup({async: true});
            },
            switchToSource: function(el){
                el.parent().children().removeClass('active');
                el.addClass('active');

                el.parents('dd').children('.cms-editor').hide();
                el.parents('dd').children('.cms-editor-options').hide();
                el.parents('dd').children('.cms-preview').show();

                AceHelper.loadToPreview(el.parents('dd').children('.cms-preview'));
                AceHelper.redraw();
            },
            switchToEditor: function(el){
                el.parent().children().removeClass('active');
                el.addClass('active');

                el.parents('dd').children('div.cms-editor').show();
                el.parents('dd').children('.cms-editor-options').show();
                el.parents('dd').children('.cms-preview').html('preview').hide();
                AceHelper.redraw();
            },
            submit: function(){
                if (AceHelper.editors) {
                    for (ed in AceHelper.editors) {
                        AceHelper.editors[ed].textarea.val(AceHelper.editors[ed].editor.getSession().getValue());
                    }
                }
            },
            redraw: function(){
                if (AceHelper.editors) {
                    for (ed in AceHelper.editors) {
                        AceHelper.editors[ed].editor.renderer.onResize(true);
                    }
                }
            },
            loadToPreview: function(el)
            {
                el.html('Saving Data ...');

                /*sync all code areas*/
                AceHelper.submit();

                /*save data*/
                $.post('/cms/page/edit/id/'+pageId+'/', $('form.code').serialize(), function(){
                    el.html('Rendering Page ...');

                    $.get('/cms/page/render/id/'+pageId+'/escape/1/', function(data){
                        el.html(data);
                    });
                });
            }
        }


        AceHelper.init();
    };

    if ($('#page_content').length) {

        opt = '<ul class="cms-editorElementTypes">';
        $('.elementType').each(function(){
            if ($(this).data('elementtype')) {
                opt += '<li>'+$(this).data('elementtype')+'</li>';
            }
        });
        opt += '<li>Element:</li>';
        opt += '</ul>';

        $('#page_content').parent().addClass('pal-ui-textarea').append('<div id="pageContentOptions" class="cms-editor-options">'+opt+'</div>');


        $('.cms-editorElementTypes li').click(function(){
            id = $(this).parents('#pageContentOptions').parent().children('.code').attr('id');
            if (AceHelper.editors[id]) {
                AceHelper.editors[id]['editor'].insert('{{'+$(this).html()+'}}');
            }
        });
    }
});