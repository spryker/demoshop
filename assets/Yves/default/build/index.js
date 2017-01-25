'use strict';

const path = require('path');
const Impala = require('impala');
const configuration = require('./webpack.config');

const settings = {
    app: {
        name: 'demoshop-yves',
        verbosity: Impala.Api.Logger.Verbosity.VERBOSE
    },

    entryPoints: {
        patterns: ['**/Yves/**/*.entry.js'],
        paths: [path.resolve('vendor/spryker')],
        description: 'looking for entry points...'
    }
};

let app = Impala.create(settings.app);
let paths = app.finder.find(settings.entryPoints);
let entryPoints = app.finder.toObject(paths, '.entry.js');

configuration.entry = Object.assign({}, configuration.entry, entryPoints);
return app.builder.build(configuration);
