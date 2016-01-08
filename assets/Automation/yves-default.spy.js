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
    'webpack',
    'extract-text-webpack-plugin'
]);

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
            loader: 'file?name=/assets/default/fonts/[name].[ext]'
        }, {
            test: /\.(jpe?g|png|gif|svg)\??(\d*\w*=?\.?)+$/i,
            loader: 'file?name=/assets/default/img/[name].[ext]',
        }]
    },
    output: {
        path: path.join(cwd, './public/Yves'),
        filename: '/assets/default/js/[name].js'
    },
    plugins: [
        new ExtractTextPlugin('assets/default/css/[name].css', {
            allChunks: true
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        })
    ],
    devtool: 'sourceMap'
};
