zed.modules.accessibility = {
    init : function() {
        var actions = zed.modules.accessibility.getActions();
        zed.modules.accessibility.renderActions(actions);
        zed.modules.accessibility.shortcuts.init();
    },
    renderActions : function(actions) {
        var renderTarget = $('body > footer > .actions');
        renderTarget.html('');
        $.each(actions, function(key) {
            if (typeof this.action == 'string') {
                renderTarget.append('<a href="' + this.action + '">' + this.label + '</a>');
                return;
            }
            renderTarget.append('<span onclick="$(\'.accessibility_action_' + key + '\').click();">' + this.label + '</span>');
        });
    },
    getActions : function() {
        var targets = $('#content headline .actions a, #content headline .actions span, dl.zend_form input[type="submit"]');
        var actions = [];
        $.each(targets, function(key) {
            if ($(this).is('a')) {
                actions.push({
                    label : $(this).text(),
                    action : $(this).attr('href')
                });
            }
            if ($(this).is('span')) {
                $(this).addClass('accessibility_action_' + key);
                actions.push({
                    label : $(this).text(),
                    action : null,
                    selector : 'accessibility_action_' + key
                });
            }
            if ($(this).is('input')) {
                $(this).addClass('accessibility_action_' + key);
                actions.push({
                    label : $(this).val(),
                    action : null,
                    selector : 'accessibility_action_' + key
                });
            }
        });
        return actions;
    },
    shortcuts : {
        hints : [
            '<strong>The following shortcuts are available in super mode:</strong>',
            '1..9: open bookmark 1-9 from your list',
            'a..z: open page 1-26',
            '&#160;',
            '<strong>The following shortcuts are available generally:</strong>',
            'Ctrl+S: Trigger the first action on the bottom bar',
            '&#160;',
            '<i>- you should activate the super mode at the same time as you activate a shortcut. To do so, hold Esc + [1..9 / a..z] at the same time.</i>',
            '<i>- hold Esc again to leave the super mode</i>'
        ],
        init : function() {
            $.each(zed.modules.accessibility.shortcuts.hints, function() {
                $('#shortcuts .wrapper').append('<p>' + this + '</p>');
            });
            zed.modules.keyboard.combinations[27] = function() {
                $('#shortcuts').toggle();
            }
            for (i = 49; i < 58; i++) {
                zed.modules.keyboard.combinations[i] = function(key) {
                    if ($('#shortcuts').is(':visible')) {
                        if ($('section > header #tray li.bookmarks .onActive a').get(key-49)) {
                            var target = $($('section > header #tray li.bookmarks .onActive a').get(key-49)).attr('href');
                            $('#shortcuts').hide();
                            document.location.href = target;
                        }
                    }
                }
            }
            for (i = 65; i < 91; i++) {
                zed.modules.keyboard.combinations[i] = function(key) {
                    if ($('#shortcuts').is(':visible')) {
                        if ($('section > header nav > ul > li a').get(key-65)) {
                            var target = $($('section > header nav > ul > li a').get(key-65)).attr('href');
                            $('#shortcuts').hide();
                            document.location.href = target;
                        }
                    }
                }
            }
        }
    }
}