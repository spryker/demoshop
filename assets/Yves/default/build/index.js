'use strict';

const path = require('path');
const Impala = require('impala');
const cwd = process.cwd();
const webpack = require('./webpack');

const app = Impala.create({
    name: 'demoshop:yves'
});

const paths = app.finder.find([
    '**/Yves/**/*.entry.js'
], [
    path.join(cwd, 'vendor/spryker/spryker/Bundles')
]);

const entryPoints = app.finder.toObject(paths, '.entry.js');

webpack.configuration.entry = Object.assign({}, webpack.configuration.entry, entryPoints);

app.builder.build(webpack.configuration);
