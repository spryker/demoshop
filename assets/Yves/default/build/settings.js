/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

const path = require('path');
const argv = require('yargs').argv;

// impala logger verbosity: SILENT, DEFAULT, VERBOSE, LOUD
const Verbosity = require('Impala').Logger.Verbosity;

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

    // build settings
    build: {
        themeName,
        sourcePath,
        publicPath,
        rootDir,
        sourceDir,
        publicDir
    },

    // impala settings
    impala: {

        // application settings
        app: {
            // application name (shown by the logger)
            name: 'demoshop-yves',
            // impala logger verbosity level
            // webpack verbosity must be set in the config
            verbosity: isVerbose ? Verbosity.LOUD : Verbosity.DEFAULT
        },

        // entry points settings
        entryPoints: {
            // default pattern
            patterns: ['**/Yves/**/*.entry.js'],
            // where to search for entry points
            paths: [path.resolve('vendor/spryker')],
            // description for the logger
            description: 'looking for entry points...'
        }
    }
};

module.exports = settings;
