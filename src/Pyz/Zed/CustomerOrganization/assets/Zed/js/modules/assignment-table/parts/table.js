/**
 * Copyright (c) 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

'use strict';

var TableHandler = require('./table-handler');

/**
 * @param {string} sourceTableSelector
 * @param {string} destinationTableSelector
 * @param {string} checkboxSelector
 * @param {string} labelCaption
 * @param {string} labelId
 * @param {string} formFieldId
 * @param {function} onRemoveCallback
 *
 * @return {TableHandler}
 */
function create(sourceTableSelector, destinationTableSelector, checkboxSelector, labelCaption, labelId, formFieldId, onRemoveCallback)
{
    $(destinationTableSelector).DataTable({destroy: true});

    var tableHandler = TableHandler.create(
        $(sourceTableSelector),
        $(destinationTableSelector),
        labelCaption,
        labelId,
        formFieldId,
        onRemoveCallback
    );

    $(sourceTableSelector).DataTable().on('draw', function(event, settings) {
        $(checkboxSelector, $(sourceTableSelector)).off('change');
        $(checkboxSelector, $(sourceTableSelector)).on('change', function() {
            var $checkbox = $(this);
            var info = $.parseJSON($checkbox.attr('data-info'));

            if (tableHandler.isCheckboxActive($checkbox)) {
                tableHandler.addSelectedItem(info.id, info.email, info.firstName, info.lastName);
            } else {
                tableHandler.removeSelectedItem(info.id);
            }
        });

        for (var i = 0; i < settings.json.data.length; i++) {
            var item = settings.json.data[i];
            var idItem = parseInt(item[1], 10);

            var selector = tableHandler.getSelector();
            if (selector.isItemSelected(idItem)) {
                tableHandler.checkCheckbox($('input[value="' + idItem + '"]', $(sourceTableSelector)));
            }
        }
    });

    return tableHandler;
}

module.exports = {
    create: create,
    CHECKBOX_CHECKED_STATE_CHECKED: TableHandler.CHECKBOX_CHECKED_STATE_CHECKED,
    CHECKBOX_CHECKED_STATE_UN_CHECKED: TableHandler.CHECKBOX_CHECKED_STATE_UN_CHECKED
};
