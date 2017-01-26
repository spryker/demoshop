'use strict';

const path = require('path');
const argv = require('yargs').argv;
const Verbosity = require('Impala').Logger.Verbosity;

const isVerbose = !!argv.verbose;

const themeName = 'default';

const rootDir = process.cwd();
const sourcePath = './assets/Yves/' + themeName;
const publicPath = '/assets/' + themeName;
const sourceDir = path.resolve(sourcePath);
const publicDir = path.resolve(path.join('./public/Yves', publicPath));

const settings = {
    options: {
        isProduction: !!argv.prod,
        isWatching: !!argv.dev,
        isVerbose
    },

    build: {
        themeName,
        sourcePath,
        publicPath,
        rootDir,
        sourceDir,
        publicDir
    },

    impala: {
        app: {
            name: 'demoshop-yves',
            verbosity: isVerbose ? Verbosity.LOUD : Verbosity.DEFAULT
        },

        entryPoints: {
            patterns: ['**/Yves/**/*.entry.js'],
            paths: [path.resolve('vendor/spryker')],
            description: 'looking for entry points...'
        }
    }
};

module.exports = settings;
