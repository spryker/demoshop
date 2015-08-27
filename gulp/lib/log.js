/**
 * (c) Spryker Systems GmbH copyright protected
 */

'use strict';

function change(context, subject, event) {
    var devPath = event.path.replace(basePath, '');
    console.log(context, '{0} {1} {2}'.format(subject, devPath, event.type).magenta);
};

module.exports = {
    change: change
};
