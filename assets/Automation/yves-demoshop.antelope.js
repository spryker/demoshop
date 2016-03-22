/**
 * Demoshop theme comfiguration
 */

'use strict';

let path = require('path');
let R = require('ramda');
let cwd = process.cwd();

// webpack
let webpack = require('webpack');
let ExtractTextPlugin = require('extract-text-webpack-plugin');

let isDebug = process.argv.indexOf('--debug') > -1;
let isProduction = process.argv.indexOf('--production') > -1;

module.exports = {
    module: {
        loaders: [{
            test: /\.css\??(\d*\w*=?\.?)+$/i,
            loader: ExtractTextPlugin.extract('style', 'css')
        }, {
            test: /\.scss$/i,
            loader: ExtractTextPlugin.extract('style', 'css!resolve-url!sass?sourceMap')
        }, {
            test: /\.(ttf|woff2?|eot)\??(\d*\w*=?\.?)+$/i,
            loader: 'file?name=/assets/demoshop/fonts/[name].[ext]'
        }, {
            test: /\.(jpe?g|png|gif|svg)\??(\d*\w*=?\.?)+$/i,
            loader: 'organizer?rules=images',
        }]
    },
    organizerRules: {
        images: [{
            container: /fonts\//,
            name: '/assets/demoshop/fonts/[name].[ext]'
        }, {
            container: /node_modules\//,
            name: '/assets/demoshop/img/modules/[bundle]/[name].[ext]'
        }, {
            name: '/assets/demoshop/img/[name].[ext]'
        }]
    },
    output: {
        path: path.join(cwd, './public/Yves'),
        filename: '/assets/demoshop/js/[name].js'
    },
    plugins: [
        new ExtractTextPlugin('assets/demoshop/css/[name].css', {
            allChunks: true
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        }),
        new webpack.DefinePlugin({
            PRODUCTION: isProduction,
            WATCH: isDebug
        })
    ],
    watchOptions: {
        poll: true
    },
    devtool: 'sourceMap'
};
