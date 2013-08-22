zed.modules.bookmarks = {
    init : function() {
        zed.vars.exchange.front = zed.modules.bookmarks.getCookieContent();
        zed.modules.bookmarks.render(zed.vars.exchange.front);
    },
    getCookieContent : function() {
        if (document.cookie.search('zed_front=') == -1) {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + 3000);
            document.cookie = 'zed_front={}; path=/; expires=' + expireDate.toUTCString();
            return {};
        }
        var cookieContent = document.cookie.substr(document.cookie.search('zed_front=')).split(';')[0].split('=')[1];
        return $.parseJSON(cookieContent);
    },
    isInList : function(front) {
        var isInList = false;
        if (front.bookmarks) {
            $.each(front.bookmarks, function() {
                if (zed.modules.bookmarks.isCurrentPage(this)) {
                    isInList = true;
                }
            });
        }
        return isInList;
    },
    isCurrentPage : function(configuration) {
        var currentPage = zed.vars.exchange.page.current;
        var isCurrentPage = false;
        if (configuration.module == currentPage.module && configuration.controller == currentPage.controller && configuration.action == currentPage.action) {
            isCurrentPage = true;
        }
        return isCurrentPage;
    },
    render : function(front) {
        if (!front.bookmarks) {
            front.bookmarks = [];
        }
        var $renderTarget = $('section > header #tray li.bookmarks .onActive');
        $renderTarget.html('');
        var $item;
        var hasCurrentPage = zed.modules.bookmarks.isInList(front);
        if (!hasCurrentPage) {
            $item = $('<li>bookmark current page</li>');
            $item.click(zed.modules.bookmarks.add);
        } else {
            $item = $('<li>remove current page</li>');
            $item.click(zed.modules.bookmarks.remove);
        }
        $renderTarget.append($item);
        $.each(front.bookmarks, function() {
            //if (!zed.modules.bookmarks.isCurrentPage(this)) {
            $item = '<a href="/' + this.module + '/' + this.controller + '/' + this.action + '">' + this.label + '</a>';
            $renderTarget.append($item);
            //}
        });
    },
    add : function() {
        var page = zed.vars.exchange.page;
        if (!zed.vars.exchange.front.bookmarks) {
            zed.vars.exchange.front.bookmarks = [];
        }
        var hasCurrentPage = zed.modules.bookmarks.isInList(zed.vars.exchange.front);
        if (hasCurrentPage) {
            return;
        }
        var label = window.prompt('Please enter a title for the bookmark:', $('#content > headline > label').text().replace(/[^a-zA-Z_ \-():!]/,'-'));
        zed.vars.exchange.front.bookmarks.push({
            label : label.replace(/[^a-zA-Z_ \-():!]/,'-'),
            module : page.current.module,
            controller : page.current.controller,
            action : page.current.action
        });
        zed.modules.bookmarks.updateCookie();
        zed.modules.bookmarks.render(zed.vars.exchange.front);
    },
    remove : function() {
        var page = zed.vars.exchange.page;
        var hasCurrentPage = zed.modules.bookmarks.isInList(zed.vars.exchange.front);
        if (!hasCurrentPage) {
            alert('Error: The page has already been removed!');
            return;
        }
        $.each(zed.vars.exchange.front.bookmarks, function(key) {
            if (zed.modules.bookmarks.isCurrentPage(this)) {
                zed.vars.exchange.front.bookmarks.splice(key, 1);
            }
        });
        zed.modules.bookmarks.updateCookie();
        zed.modules.bookmarks.render(zed.vars.exchange.front);
    },
    updateCookie : function() {
        var content = JSON.stringify(zed.vars.exchange.front);
        var expireDate = new Date();
        expireDate.setDate(expireDate.getDate() + 3000);
        document.cookie = 'zed_front=' + content + '; path=/; expires=' + expireDate.toUTCString();
    }
}