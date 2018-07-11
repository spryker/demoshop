/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

const merge = require('webpack-merge');
const config = require('./development');

module.exports = merge(config, {
    watch: true
})
