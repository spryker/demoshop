/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

// this is a very pure webpack 2 configuration
// for more info and docs:
// https://webpack.js.org

const path = require('path');
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
    context: settings.build.rootDir,
    stats: settings.options.isVerbose ? 'normal' : 'errors-only',
    devtool: settings.options.isProduction ? false : 'cheap-module-eval-source-map',

    watch: settings.options.isWatching,
    watchOptions: {
        aggregateTimeout: 300,
        poll: 500,
        ignored: /(node_modules|vendor|public|src)/
    },

    entry: {
        'vendor': path.join(settings.build.sourceDir, 'vendor.entry.js'),
        'app': path.join(settings.build.sourceDir, 'app.entry.js')
    },

    output: {
        path: settings.build.publicDir,
        filename: `/js/[name].js`
    },

    resolve: {
        modules: ['node_modules', settings.build.sourcePath],
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
                    publicPath: settings.build.publicPath
                }
            }]
        }]
    },

    plugins: [
        new webpack.LoaderOptionsPlugin({
            options: {
                context: settings.build.rootDir,
                postcss: postCssPlugins
            }
        }),
        new webpack.DefinePlugin({
            DEV: !settings.options.isProduction,
            'process.env': {
                'NODE_ENV': settings.options.isProduction ? '"production"' : '"development"'
            }
        }),
        new ExtractTextPlugin({
            filename: 'css/[name].css'
        }),
        new CopyPlugin([{
            from: path.join(settings.build.sourceDir, 'img'),
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
