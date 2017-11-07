/**
 * Copyright (c) 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

'use strict';

var ItemTable = require('./parts/table');

var sourceTabSelector = '#available-items-source-tab';
var destinationTabSelector = '#available-items-destination-tab';
var fieldToBeAssignedItemIds = '#js-item-to-assign-ids-csv-field';
var checkboxSelector = '.js-item-checkbox';

var sourceTableSelector = sourceTabSelector + ' table.table';
var destinationTabLabelSelector = destinationTabSelector + '-label';
var destinationTableSelector = destinationTabSelector + '-table';
var buttonSelectAllSelector = sourceTabSelector + ' .js-select-all-button a';
var tableHandler;

/**
 * @return {void}
 */
function initialize() {
    tableHandler = ItemTable.create(
        sourceTableSelector,
        destinationTableSelector,
        checkboxSelector,
        $(destinationTabLabelSelector).text(),
        destinationTabLabelSelector,
        fieldToBeAssignedItemIds,
        onRemove
    );

    $(buttonSelectAllSelector).on('click', tableHandler.selectAll);
}

/**
 * @return {boolean}
 */
function onRemove() {
    var $link = $(this);
    var id = $link.data('id');
    var action = $link.data('action');

    var dataTable = $(destinationTableSelector).DataTable();
    dataTable.row($link.parents('tr')).remove().draw();

    tableHandler.getSelector().removeItemFromSelection(id);
    tableHandler.updateSelectedItemsLabelCount();
    $('input[value="' + id + '"]', $(sourceTableSelector)).prop('checked', false);

    return false;
}

module.exports = {
    initialize: initialize
};
