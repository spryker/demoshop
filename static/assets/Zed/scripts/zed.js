/*global
  jQuery: false
*/
( function ( $, undefined ) {
  'use strict';

  $( 'body' ).on({
    click : function ( ev ) {
      ev.preventDefault();
      $( this ).tab( 'show' );
    }
  }, '.nav-tabs a' );


    // quickfix, of course the old modules need to be re-enabled
    window.zed = {};
    zed.vars = {};
    zed.vars.exchange = {};
    zed.vars.exchange.page = {};
    zed.vars.exchange.page.current = {};

    // timeout for testing purposes only
    window.setTimeout(function() {
        // gridui snippet, has to be implemented
        var gridUi = {
            configs : {
                get : function(resource) {
                    if (!this[resource]) {
                        this[resource] = {};
                    }
                    if (!this[resource].fields) {
                        this[resource].fields = {};
                    }
                    return this[resource];
                },
                set : function(resource) {
                    console.log('config of grid ' + resource + ' changed', JSON.stringify(this[resource]));
                }
            },
            fields : {
                get : function(gridResource, fieldName) {
                    var config = gridUi.configs.get(gridResource);
                    if (!config.fields[fieldName]) {
                        config.fields[fieldName] = {};
                    }
                    return config.fields[fieldName];
                }
            },
            columnToggle : function(e) {
                var field = gridUi.fields.get(this, e.column.field);
                field.hidden = e.column.hidden;
                gridUi.configs.set(this);
            },
            columnReorder : function(e) {
                var field = gridUi.fields.get(this, e.column.field);
                field.index = e.newIndex;
                gridUi.configs.set(this);
            },
            columnResize : function(e) {
                var field = gridUi.fields.get(this, e.column.field);
                field.width = e.newWidth;
                gridUi.configs.set(this);
            },
            change : function(e) {
                var config = gridUi.configs.get(this);
                config.group = e.sender._group;
                config.sort = e.sender._sort;
                config.filter = e.sender._filter;
                gridUi.configs.set(this);
            }
        };

        $('[data-role=grid]').each(function() {
            var grid = $(this).data('kendoGrid');
            var gridId = $(this).attr('id');

            grid.bind('columnHide', gridUi.columnToggle.bind(gridId))
                .bind('columnShow', gridUi.columnToggle.bind(gridId))
                .bind('columnReorder', gridUi.columnReorder.bind(gridId))
                .bind('columnResize', gridUi.columnResize.bind(gridId))
                .dataSource.bind('change', gridUi.change.bind(gridId));
        });
    }, 3000);
} )( jQuery );
