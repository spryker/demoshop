/**
 * Copyright (c) 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

'use strict';

function ItemSelector() {
    var itemSelector = {};
    var selectedItems = {};
    var idKey = 'id';

    itemSelector.addItemToSelection = function(idItem) {
        selectedItems[idItem] = idItem;
    };

    itemSelector.removeItemFromSelection = function(idItem) {
        delete selectedItems[idItem];
    };

    itemSelector.isItemSelected = function(idItem) {
        return selectedItems.hasOwnProperty(idItem);
    };

    itemSelector.clearAllSelections = function() {
        selectedItems = {};
    };

    itemSelector.addAllToSelection = function(data) {
        for (var i = 0; i < data.length; i++) {
            var id = data[i][idKey];
            selectedItems[id] = id;
        }
    };

    itemSelector.getSelected = function() {
        return selectedItems;
    };

    return itemSelector;
}

module.exports = {
    /**
     * @return {ItemSelector}
     */
    create: function() {
        return new ItemSelector();
    }
};
