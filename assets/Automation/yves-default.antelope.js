/**
 * Default theme comfiguration
 */

'use strict';

let path = require('path');
let cwd = process.cwd();

// webpack
let webpack = require('webpack');
let ExtractTextPlugin = require('extract-text-webpack-plugin');

let isDebug = process.argv.indexOf('--debug') > -1;
let isProduction = process.argv.indexOf('--production') > -1;

module.exports = {
    skip: true,
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
            loader: 'organizer?rules=images',
        }]
    },
    organizerRules: {
        images: [{
            search: /node_modules\//,
            name: '/assets/default/img/modules/[bundle]/[name].[ext]'
        }, {
            search: /fonts\//,
            name: '/assets/default/fonts/[name].[ext]'
        }, {
            name: '/assets/default/img/[name].[ext]'
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
        }),
        new webpack.NewWatchingPlugin()
    ],
    sassLoader: {
        outputStyle: isProduction ? 'compact' : 'expanded',
        sourceComments: !isProduction
    },
    watchOptions: {
        poll: true
    },
    devtool: 'sourceMap'
};
