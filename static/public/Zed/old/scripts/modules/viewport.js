zed.modules.viewport = {
    vars : {
        newWidth : function() { return this.tableWidth() + 110; },
        tableWidth : function() {
            var tableWidth = 0;
            $('table.grid').each(function() {
                if ($(this).width() > tableWidth) {
                    tableWidth = $(this).width();
                }
            });
            return tableWidth;
        }
    },
    init : function() {
        $(window).resize(function() {
            zed.modules.viewport.update();
        });
        this.update();
        window.setTimeout(function() { zed.modules.viewport.update(); }, 200);
    },
    reset : function() {
        $('html').css({ width : 'auto' });
    },
    update : function() {
        this.reset();
        if (this.vars.tableWidth() <= $(document).width() - 110) {
            return;
        }
        $('html').css({ width : this.vars.newWidth() });
    }
}