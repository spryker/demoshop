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
            loader: 'file?name=/assets/demoshop/img/[name].[ext]',
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
            jQuery: 'jquery'
        }),
        new webpack.DefinePlugin({
            PRODUCTION: isProduction,
            WATCH: isDebug
        }),
        new webpack.optimize.UglifyJsPlugin({
            comments: isDebug,
            sourceMap: isDebug,
            compress: isProduction,
            mangle: isProduction
        })
    ],
    devtool: 'sourceMap'
};
