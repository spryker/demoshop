
function appendToPreviewOverlay(html)
{
    var $previewContent = '<div class="previewContent">' + html + '</div>';
    $('#previewPane').html($previewContent);
}

function saveEditorContentPrepareHtml(name)
{
    var html=CKEDITOR.instances['html'].getData();
    html=html.replace(/&amp;/g, "&").replace(/&gt;/g, ">").replace(/&lt;/g, "<").replace(/&quot;/g, "\"");
    CKEDITOR.instances['html'].setData(html);
    document.forms[name].submit();
}

$(function() {
    //--------------------------
    //tooltip stuff
    $("#templateNameMailConstantsHint").tooltip({ effect: 'slide'});
    $("#templatePlaceholdersHint").tooltip({offset: [200, 0],effect: 'slide'});

    //--------------------------
    //overlay stuff
    var $templatePreviewOverlay = $('<div>', {
        id: 'templatePreviewOverlay',
        class: 'simple_overlay'
    });
    var $templatePreviewContainer = $('<div id="previewContainer"><h1>Saatchi Online</h1><h2>Discover art. Get discovered.</h2><h3>HTML Preview</h3><div id="previewPane"></div></div>');
    $templatePreviewOverlay.append($templatePreviewContainer);

    $('body').append($templatePreviewOverlay);
    $("a[rel]").overlay();
    $("button[rel]").overlay();

    //--------------------------
    //click handler

    $("#mailConstantsAdd").click(function() {
        $('#name').val($('#mailConstantOptions option:selected').text());
    });

    $( 'body' ).on({
     click : function( ev ){
      ev.preventDefault();
      var $target = $( ev.currentTarget );
      var $content = $( $target.data( 'preview-selector' ));

      var value;
      if ( 'CKEDITOR' in window ) {
          value = CKEDITOR.instances['html'].getData();
      }
      appendToPreviewOverlay(value || $content.val() || $content.html());
     }
    }, '.preview[data-preview-selector]' );

    if ( 'CKEDITOR' in window ) {
        CKEDITOR.replace('html');

        CKEDITOR.instances['html'].on( 'mode', function(ev) {
            if ( ev.editor.mode == 'source' ) {
                var str=ev.editor.getData();
                str=str.replace(/&amp;/g, "&").replace(/&gt;/g, ">").replace(/&lt;/g, "<").replace(/&quot;/g, "\"");
                ev.editor.setData(str);
            }
        });
    }

});


