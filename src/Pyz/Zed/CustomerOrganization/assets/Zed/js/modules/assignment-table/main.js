/**
 * Copyright (c) 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

'use strict';

require('ZedGui');
var availableItemTable = require('./available-item-table');
var assignedItemTable = require('./assigned-item-table');

$(document).ready(function() {
    availableItemTable.initialize();
    assignedItemTable.initialize();
});
