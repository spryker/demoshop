/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

// this is a very pure webpack 2 configuration
// for more info and docs:
// https://webpack.js.org

const path = require('path');
const oryx = require('@spryker/oryx');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const settings = require('./settings');

let postCssPlugins = [];

if (settings.options.isProduction) {
    postCssPlugins = [
        autoprefixer({
            browsers: ['last 4 versions']
        })
    ];
}

let config = {
    context: settings.paths.rootDir,
    stats: settings.options.isVerbose ? 'normal' : 'errors-only',
    devtool: settings.options.isProduction ? false : 'cheap-module-eval-source-map',

    watch: settings.options.isWatching,
    watchOptions: {
        aggregateTimeout: 300,
        poll: 500,
        ignored: /node_modules/
    },

    entry: oryx.find(settings.entry, {
        'app': path.join(settings.paths.sourceDir, 'app.entry.js'),
        'vendor': path.join(settings.paths.sourceDir, 'vendor.entry.js')
    }),

    output: {
        path: settings.paths.publicDir,
        filename: `/js/[name].js`
    },

    resolve: {
        modules: ['node_modules', settings.paths.sourcePath],
        extensions: ['.js', '.css', '.scss']
    },

    module: {
        rules: [{
            test: /\.css\??(\d*\w*=?\.?)+$/i,
            loader: ExtractTextPlugin.extract({
                fallbackLoader: 'style-loader',
                loader: [{
                    loader: 'css-loader',
                    query: {
                        sourceMap: !settings.options.isProduction
                    }
                }, {
                    loader: 'postcss-loader'
                }]
            })
        }, {
            test: /\.scss$/i,
            loader: ExtractTextPlugin.extract({
                fallbackLoader: 'style-loader',
                loader: [{
                    loader: 'css-loader',
                    query: {
                        sourceMap: !settings.options.isProduction
                    }
                }, {
                    loader: 'postcss-loader'
                }, {
                    loader: 'sass-loader',
                    query: {
                        sourceMap: !settings.options.isProduction,
                        outputStyle: settings.options.isProduction ? 'compressed' : 'expanded',
                    }
                }]
            })
        }, {
            test: /\.(ttf|woff2?|eot|svg|otf)\??(\d*\w*=?\.?)+$/i,
            use: [{
                loader: 'file-loader',
                options: {
                    name: '/fonts/[name].[ext]',
                    publicPath: settings.paths.publicPath
                }
            }]
        }]
    },

    plugins: [
        new webpack.LoaderOptionsPlugin({
            options: {
                context: settings.paths.rootDir,
                postcss: postCssPlugins
            }
        }),
        new webpack.DefinePlugin({
            DEV: !settings.options.isProduction,
            'process.env': {
                'NODE_ENV': settings.options.isProduction ? '"production"' : '"development"'
            }
        }),
        new webpack.ProvidePlugin({
            '$': 'jquery',
            'jQuery': 'jquery',
            'jquery': 'jquery'
        }),
        new ExtractTextPlugin({
            filename: 'css/[name].css'
        }),
        new CopyPlugin([{
            from: path.join(settings.paths.sourceDir, 'img'),
            to: 'img'
        }])
    ]
};

if (settings.options.isProduction) {
    config.plugins = [
        ...config.plugins,
        new webpack.optimize.UglifyJsPlugin({
            output: {
                comments: false,
                source_map: null
            },
            sourceMap: true,
            mangle: false,
            compress: {
                warnings: false,
                dead_code: true
            }
        })
    ];
}

module.exports = config;
