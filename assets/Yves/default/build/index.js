'use strict';

const path = require('path');
const impala = require('impala');
const settings = require('./settings');
const configuration = require('./webpack.config');

const app = impala.App.create(settings.impala.app);

const entryPoints = app.finder
    .find(settings.impala.entryPoints)
    .reduce((results, currentPath) => {
        let key = path.basename(currentPath, '.entry.js');
        results[key] = currentPath;
        return results;
    }, {});

configuration.entry = Object.assign({}, configuration.entry, entryPoints);
return app.builder.build(configuration);
