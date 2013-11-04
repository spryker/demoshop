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

    $(function() {
        $('#manual .handle').click(function() {
            $(this).parent().toggleClass('opened');
        });
    });

    window.gridUi = {
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
                $.get('/kendo/state/save', { grid : resource, state : JSON.stringify(this[resource])}, function(result) {
                    console.log('config of grid ' + resource + ' changed. server says: success: ', result ? result.success : false);
                });
            },
            apply : function(resource, config) {
                console.log('applying', resource, config);
                this[resource] = config;
            }
        },
        initials : [],
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
            if ($.inArray(this, gridUi.initials) !== -1) {
                // prevent initial change call, it's automatically executed
                gridUi.initials = gridUi.initials.filter(function(item) {
                    return item !== this;
                }.bind(this));
                return;
            }
            var config = gridUi.configs.get(this);
            config.group = e.sender._group;
            config.sort = e.sender._sort;
            config.filter = e.sender._filter;
            gridUi.configs.set(this);
        },
        bind : function(resource) {
            var $target = $('#' + resource + '[data-role=grid]');
            if (!$target.length) { return; }
            this.initials.push(resource);
            $target.data('kendoGrid').bind('columnHide', this.columnToggle.bind(resource))
                .bind('columnShow', this.columnToggle.bind(resource))
                .bind('columnReorder', this.columnReorder.bind(resource))
                .bind('columnResize', this.columnResize.bind(resource))
                .dataSource.bind('change', this.change.bind(resource));
        }
    };

} )( jQuery );
