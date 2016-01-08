/**
 * 
 * description_here
 * @copyright: Spryker Systems GmbH
 *
 */

'use strict';

let path = require('path');
let spy = require('spy-provider');
let cwd = process.cwd();

spy.get([
    'ramda',
    'webpack',
    'extract-text-webpack-plugin'
]);

let R = require('ramda');
let webpack = require('webpack');
let ExtractTextPlugin = require('extract-text-webpack-plugin');

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
        })
    ],
    devtool: 'sourceMap'
};
