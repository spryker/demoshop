/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

const path = require('path');
const argv = require('yargs').argv;

// cli verbose arg can be invoked:
// $ npm run script-name -- --verbose
const isVerbose = !!argv.verbose;

// demoshop theme name
const themeName = 'default';

// paths and directories
const rootDir = process.cwd();
const sourcePath = './assets/Yves/' + themeName;
const publicPath = '/assets/' + themeName;
const sourceDir = path.resolve(sourcePath);
const publicDir = path.resolve(path.join('./public/Yves', publicPath));

const settings = {
    // options: cli args
    options: {
        isProduction: !!argv.prod,
        isWatching: !!argv.dev,
        isVerbose
    },

    // paths/dirs
    paths: {
        themeName,
        sourcePath,
        publicPath,
        rootDir,
        sourceDir,
        publicDir
    },

    // oryx entry settings
    entry: {
        dirs: [path.resolve('vendor/spryker'), path.resolve('vendor/spryker-eco')],
        patterns: ['**/Yves/**/*.entry.js'],
        defineName: p => path.basename(p, '.entry.js'),
        description: 'looking for entry points...'
    }
};

module.exports = settings;
