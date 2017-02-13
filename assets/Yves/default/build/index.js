/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

const impala = require('impala');
const configuration = require('./webpack.config');

// build the assets with webpack
impala.build(configuration);
