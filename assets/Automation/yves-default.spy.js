/**
 * 
 * description_here
 * @copyright: Spryker Systems GmbH
 *
 */

'use strict';

let path = require('path');
let cwd = process.cwd();

// webpack
let webpack = require('webpack');
let ExtractTextPlugin = require('extract-text-webpack-plugin');

let config = {
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

if (process.argv.indexOf('--production') === -1) {
    config.plugins = config.plugins.concat([
        new webpack.optimize.UglifyJsPlugin({
            comments: false,
            sourceMap: process.argv.indexOf('--debug') === -1,
            compress: {
                warnings: !!process.argv.indexOf('--debug') === -1
            },
            mangle: {
                except: ['$', 'exports', 'require']
            }
        })
    ]);
}

module.exports = config;
