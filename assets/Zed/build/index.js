'use strict';

const path = require('path');
const Impala = require('impala');
const cwd = process.cwd();
const webpack = require('./webpack');

const app = Impala.create({
    name: 'zed',
    verbosity: Impala.Api.Logger.Verbosity.LOUD
});

const paths = app.finder
    .find(['**/Zed/**/*.entry.js'], [path.join(cwd, 'vendor/spryker/spryker/Bundles')]);

const entryPoints = app.finder.toObject(paths, '.entry.js');

const modules = app.finder
    .find(['**/Zed/package.json'], [path.join(cwd, 'vendor/spryker/spryker/Bundles')])
    .map(p => path.resolve(path.dirname(p), 'node_modules'));

webpack.configuration.entry = Object.assign({}, webpack.configuration.entry, entryPoints);
webpack.configuration.resolve.modules = modules.concat(webpack.configuration.resolve.modules);

app.builder.build(webpack.configuration);
