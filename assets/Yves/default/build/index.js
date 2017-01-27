/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

const path = require('path');
const impala = require('impala');
const settings = require('./settings');
const config = require('./webpack.config');

// create the impala application
const app = impala.App.create(settings.impala.app);

// get spryker core entry points
const entryPoints = app.finder

    // first globbing for the pattern
    .find(settings.impala.entryPoints)

    // then transforming the results array in an object
    // { filename: path } suitable for webpack config.entry
    .reduce((results, currentPath) => {
        let key = path.basename(currentPath, '.entry.js');
        results[key] = currentPath;
        return results;
    }, {});

// add spryker core entry points to the ones on the config
config.entry = Object.assign({}, config.entry, entryPoints);

// build the assets with webpack
return app.builder.build(config);
