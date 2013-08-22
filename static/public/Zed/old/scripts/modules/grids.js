zed.modules.grids = {
    init : function() {
        $('table.grid thead tr:first-child th > ul > li').click(function() {
            $(this).siblings().removeClass('active');
            if ($(this).hasClass('noradio')) {
                return;
            }
            $(this).toggleClass('active').find('input').eq(0).focus();
        });
        $('table.grid thead tr:first-child th > ul > li > form').click(function(event) {
            event.stopPropagation();
        });

        $('table.grid a.delete-button').click(function(event) {
            var href = $(this).attr('href');
            zed.modules.grids.addDeleteConfirmation(href);
            event.stopPropagation();
            event.preventDefault();
        });
        this.filters.init();
    },

    addDeleteConfirmation : function(href) {
        var confirmationText = '<div class="error">';
        confirmationText += 'Do you really want to delete this entry?<br />';
        confirmationText += '<a href="' + href + '">Delete this entry</a><br />';
        confirmationText += '<a href="javascript:zed.modules.grids.abortDeleteEntry();">Abort</a><br />';
        confirmationText += '<div class="x">x</div>';
        confirmationText += '</div>';
        $('.container').before(confirmationText);
    },

    abortDeleteEntry : function () {
        $('.error').fadeOut();
    },
    filters : {
        init : function() {
            this.state.update();
            $('table.grid .flags .flagControls li').click(function() {
                if (!$(this).data('values') || typeof $(this).data('values') !== 'object') { return; }
                var active = $(this).hasClass('active');
                $.each($(this).data('values'), function(key, value) {
                    if (active && $('select[name="search[' + key + '][operand]"]').val() === 'eq') {
                        $('input[name="search[' + key + '][value]"]').val('');
                        return;
                    }
                    $('select[name="search[' + key + '][operand]"]').val('eq');
                    $('input[name="search[' + key + '][value]"]').val(value);
                });
                zed.modules.grids.filters.state.update();
            });
            $('table.grid thead .flags form').submit(function(event) {
                event.preventDefault();
                $('table.grid thead .search form').submit();
            });
        },
        state : {
            update : function() {
                $('table.grid .flags .flagControls li').each(function() {
                    if (!$(this).data('values') || typeof $(this).data('values') !== 'object') {
                        $(this).removeClass('active');
                        return;
                    }
                    var active = true;
                    $.each($(this).data('values'), function(key, value) {
                        if ($('select[name="search[' + key + '][operand]"]').val() !== 'eq' || $('input[name="search[' + key + '][value]"]').val() !== value) {
                            active = false;
                        }
                    });
                    if (active) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });
            }
        }
    }
}