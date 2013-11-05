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

    $.fn.kendoGrid = (function (originalFn) {
        return function () {
            arguments[0] = gridUi.configs.patch($(this).attr('id'), arguments[0]);
            originalFn.apply(this, arguments);
        };
    })($.fn.kendoGrid);

    window.gridUi = {
        configs : {
            get : function(resource) {
                if (!this[resource]) {
                    this[resource] = {};
                }
                if (gridUi.containsModifications(this[resource])) {
                    gridUi.renderUndoBtn(resource);
                }
                if (!this[resource].fields) {
                    this[resource].fields = {};
                }
                return this[resource];
            },
            set : function(resource, refreshGrid) {
                $.get('/kendo/state/save', { grid : resource, state : JSON.stringify(this[resource])}, function() {
                    gridUi.renderUndoBtn(resource);
                    if (refreshGrid) {
                        // @todo: only reload the grid, not the page
                        document.location.href = document.location.href.split('#')[0];
                    }
                });
            },
            load : function(resource, config) {
                config = gridUi.getConfigFromUrl(resource, config);
                this[resource] = config;
            },
            patch : function(resource, kendoConfig) {
                var uiConfig = this.get(resource);
                var fieldOrder = [];
                kendoConfig.columns = kendoConfig.columns.map(function(item) {
                    fieldOrder.push(item.field);
                    if (!uiConfig.fields[item.field]) { return item; }
                    return $.extend(item, uiConfig.fields[item.field]);
                });

                if (uiConfig.reorders) {
                    $.each(uiConfig.reorders, function(fieldName, newIndex) {
                        var oldIndex = $.inArray(fieldName, fieldOrder);
                        if (oldIndex === -1) { return; }
                        kendoConfig.columns.splice(newIndex, 0, kendoConfig.columns.splice(oldIndex, 1)[0]);
                        fieldOrder.splice(newIndex, 0, fieldOrder.splice(oldIndex, 1)[0]);
                    });
                }

                if (uiConfig.group) {
                    kendoConfig.dataSource.group = uiConfig.group;
                }
                if (uiConfig.filter) {
                    kendoConfig.dataSource.filter = uiConfig.filter;
                }
                if (uiConfig.sort) {
                    kendoConfig.dataSource.sort = uiConfig.sort;
                }

                return kendoConfig;
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
            var config = gridUi.configs.get(this);
            if (!config.reorders) {
                config.reorders = {};
            }
            config.reorders[e.column.field] = e.newIndex;
            gridUi.configs.set(this);
        },
        columnResize : function(e) {
            var field = gridUi.fields.get(this, e.column.field);
            field.width = e.newWidth;
            gridUi.configs.set(this);
        },
        change : function(e) {
            var config = gridUi.configs.get(this);
            if ($.inArray(this, gridUi.initials) !== -1) {
                // prevent initial change call, it's automatically executed
                gridUi.initials = gridUi.initials.filter(function(item) {
                    return item !== this;
                }.bind(this));
                if (gridUi.containsModifications(config)) {
                    gridUi.renderUndoBtn(this);
                }
                return;
            }
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
        },
        renderUndoBtn : function(resource) {
            var $target = $('#' + resource + '[data-role=grid]');
            if (!$target.length || $target.find('.undoGridModifications').length) { return; }
            var $btn = $('<div class="undoGridModifications"></div>').attr('title', 'Reset grid modifications').html('<i class="icon-undo"></i>');
            $btn.click(function() {
                gridUi.configs[resource] = {};
                gridUi.configs.set(resource, true);
            });
            $target.prepend($btn);
            this.renderUrlBtn(resource);
        },
        renderUrlBtn : function(resource) {
            var $target = $('#' + resource + '[data-role=grid]');
            if (!$target.length || $target.find('.gridModificationsUrl').length) { return; }
            var $btn = $('<div class="gridModificationsUrl"></div>').attr('title', 'Get persistent URL for this grid configuration').html('<i class="icon-link"></i>');
            $btn.click(function() {
                alert(document.location.href.split('#')[0] + '#gridconfig->' + resource + '->' + JSON.stringify(gridUi.configs.get(resource)));
            });
            $target.prepend($btn);
        },
        containsModifications : function(config) {
            return (config.fields && Object.keys(config.fields).length)
                || (config.reorders && Object.keys(config.reorders).length)
                || (config.group && Object.keys(config.group).length)
                || (config.sort && Object.keys(config.sort).length)
                || (config.filter && Object.keys(config.filter).length);
        },
        getConfigFromUrl : function(resource, config) {
            var hash = document.location.hash.split('->');
            if (hash.length !== 3 || hash[0] !== '#gridconfig' || hash[1] !== resource) {
                return config;
            }
            return $.parseJSON(hash[2]);
        }
    };

} )( jQuery );
