zed.modules.notification = {
    init : function() {
        var $x = $('<div class="x"></div>').html('x').click(function(event) {
            event.stopPropagation();
            $('div.error,div.success,div.notification').addClass('minimized');
        });
        $('div.error,div.success,div.notification').click(function() {
            $('div.error,div.success,div.notification').removeClass('minimized');
        }).append($x);
    },
    guiMessage : {
        vars : {
            active : false
        },
        spoil : function(text) {
            if (this.vars.active) { return; }
            this.vars.active = true;
            $('#guiMessage .text').html(text).parent().addClass('show');
            window.setTimeout(function() {
                $('#guiMessage').addClass('hide');
                window.setTimeout(function() {
                    $('#guiMessage').removeClass('show hide');
                    zed.modules.notification.guiMessage.vars.active = false;
                }, 1000);
            }, 5000);
        }
    }
};