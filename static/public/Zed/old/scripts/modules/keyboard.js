zed.modules.keyboard = {
    init : function() {
        document.onkeydown = zed.modules.keyboard.registry.add;
        document.onkeyup = zed.modules.keyboard.registry.remove;
    },
    combinations : {},
    registry : {
        items : {},
        add : function(event) {
            var key = event.keyCode;
            if (zed.modules.keyboard.registry.items[key]) {
                $.each(zed.modules.keyboard.combinations, function(keyCode) {
                    if (zed.modules.keyboard.registry.items[keyCode] && zed.modules.keyboard.registry.items[keyCode] !== -2 && (new Date()).getTime() - 300 > zed.modules.keyboard.registry.items[keyCode]) {
                        this(keyCode);
                        zed.modules.keyboard.registry.items[keyCode] = -2;
                    }
                });
                return true;
            }
            zed.modules.keyboard.registry.items[key] = (new Date()).getTime();
            if (zed.modules.keyboard.registry.items[17] && zed.modules.keyboard.registry.items[83]) {
                var target = $('body > footer > .actions span:first-child, body > footer > .actions a:first-child');
                if (target.is('a')) {
                    document.location.href = target.attr('href');
                } else {
                    target.click();
                }
                return false;
            }
            return true;
        },
        remove : function(event) {
            var key = event.keyCode;
            zed.modules.keyboard.registry.items[key] = false;
            return true;
        }
    }
}