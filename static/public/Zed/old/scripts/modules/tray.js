zed.modules.tray = {
    init : function() {
        $('#tray > li > .onActive').click(function(event) {
            event.stopPropagation();
        }).parent().click(function(event) {
            event.stopPropagation();
            $(this).toggleClass('active');
        });
        $('#tray > li').click(function(event) {
            event.stopPropagation();
            $(this).siblings().removeClass('active');
            $(document).unbind('click', zed.modules.tray.deactivateAll);
            if ($(this).hasClass('active')) {
                $(document).click(zed.modules.tray.deactivateAll);
            }
        });
        this.search.init();
    },
    deactivateAll : function() {
        $('#tray > li').removeClass('active');
    },
    search : {
        init : function() {
            $('section > header #tray li.search').click(function() {
                if (!$(this).hasClass('active')) {
                    return;
                }
                $('#menuSearch').focus().siblings('select').show();
            });
            $('#menuSearch').unbind('keyup').keyup(function() {
                var search = $(this).val().toLowerCase();
                if ($(this).data('prevSearch') && search === $(this).data('prevSearch')) { return; }
                var results = {};
                $('section > header nav ul a').each(function() {
                    if ($(this).text().toLowerCase().search(search) !== -1) {
                        results[$(this).text()] = $(this).attr('href');
                    }
                });
                var displayed = Object.keys(results).sort();
                var $select = $('<select></select>');
                $select.attr('size', (displayed.length > 10 ? 10 : (displayed.length !== 1 ? displayed.length : 2)));
                $.each(displayed, function(key, val) {
                    var $option = $('<option value="' + results[val] + '"></option>').html(val);
                    $select.append($option);
                });
                $select.children('option').click(function() {
                    document.location.href = $(this).parent().hide().val();
                });
                $(this).data('prevSearch', search);
                $(this).siblings('select').remove();
                if (!displayed.length || !search.length) { return; }
                $select.val(results[displayed[0]]);
                $(this).parent().append($select);
            }).keydown(function(event) {
                if (event.keyCode && (event.keyCode === 38 || event.keyCode === 40 || event.keyCode === 13 || event.keyCode === 27)) {
                    return zed.modules.tray.search.key(event.keyCode);
                }
            });
        },
        key : function(keyCode) {
            var $select = $('section > header #tray li.search select:visible');
            if (!$select.length) {
                if (keyCode === 27) {
                    $('section > header #tray li.search').removeClass('active');
                }
                return;
            }
            switch (keyCode) {
                case 38 :
                    if ($select.children('option:selected').prev().length) {
                        $select.val($select.children('option:selected').prev().attr('value'));
                    } else {
                        $select.val($select.children('option:last-child').attr('value'));
                    }
                    break;
                case 40 :
                    if ($select.children('option:selected').next().length) {
                        $select.val($select.children('option:selected').next().attr('value'));
                    } else {
                        $select.val($select.children('option:first-child').attr('value'));
                    }
                    break;
                case 13 :
                    document.location.href = $select.hide().val();
                    break;
                case 27 :
                    $select.hide();
            }
        }
    }
}