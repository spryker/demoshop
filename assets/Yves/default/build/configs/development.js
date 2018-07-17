/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

const path = require('path');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const appSettings = require('../settings');
const finder = require('../libs/finder');
const alias = require('../libs/alias');

module.exports = {
    context: appSettings.context,
    mode: 'development',
    devtool: 'inline-source-map',

    stats: {
        colors: true,
        chunks: false,
        chunkModules: false,
        chunkOrigins: false,
        modules: false,
        entrypoints: false
    },

    entry: {
        'es6-polyfill': path.join(appSettings.context, appSettings.paths.assets, './es6-polyfill.entry.js'),
        'vendor': path.join(appSettings.context, appSettings.paths.assets, './vendor.entry.js'),
        'app': [
            path.join(appSettings.context, appSettings.paths.assets, './app/style/shop/basic.scss'),
            ...finder.findComponentEntryPoints(),
            path.join(appSettings.context, appSettings.paths.assets, './app/style/shop/util.scss'),
            path.join(appSettings.context, appSettings.paths.assets, './app.entry.js')
        ]
    },

    output: {
        path: path.join(appSettings.context, appSettings.paths.public),
        publicPath: `${appSettings.urls.assets}/`,
        filename: `./js/[name].js`,
        jsonpFunction: `webpackJsonp_${appSettings.name}`
    },

    resolve: {
        extensions: ['.ts', '.js', '.json', '.css', '.scss'],
        alias: alias.getFromTsConfig()
    },

    module: {
        rules: [
            {
                test: /\.ts$/,
                loader: 'ts-loader',
                exclude: [
                    path.join(appSettings.context, 'node_modules')
                ],
                options: {
                    context: appSettings.context,
                    configFile: path.join(appSettings.context, appSettings.paths.tsConfig),
                    compilerOptions: {
                        baseUrl: appSettings.context,
                        outDir: appSettings.paths.public
                    }
                }
            },
            {
                test: /\.scss/i,
                use: [
                    MiniCssExtractPlugin.loader, {
                        loader: 'css-loader',
                        options: {
                            importLoaders: 1
                        }
                    }, {
                        loader: 'postcss-loader',
                        options: {
                            ident: 'postcss',
                            plugins: [
                                autoprefixer({
                                    'browsers': ['> 1%', 'last 2 versions']
                                })
                            ]
                        }
                    }, {
                        loader: 'sass-loader'
                    }, {
                        loader: 'sass-resources-loader',
                        options: {
                            resources: [
                                path.join(appSettings.context, appSettings.paths.assets, './app/style/shop/shared.scss'),
                                ...finder.findComponentStyles()
                            ]
                        }
                    }
                ]
            },
            {
                test: /\.(png|jpg|gif)$/i,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '/img/vendor/[name].[ext]',
                        publicPath: '/assets/default'
                    }
                }]
            },
            {
                test: /\.(ttf|woff2?|eot|svg|otf)\??(\d*\w*=?\.?)+$/i,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '/fonts/[name].[ext]',
                        publicPath: '/assets/default'
                    }
                }]
            }
        ]
    },

    optimization: {
        runtimeChunk: 'single',
        concatenateModules: false,
        splitChunks: {
            chunks: 'initial',
            minChunks: 1,
            cacheGroups: {
                default: false,
                vendors: false
            }
        }
    },

    plugins: [
        new webpack.DefinePlugin({
            __NAME__: `'${appSettings.name}'`,
            __PRODUCTION__: false
        }),

        new CleanWebpackPlugin([
            'js',
            'css',
            'images',
            'fonts'
        ], {
            root: path.join(appSettings.context, appSettings.paths.public),
            verbose: true,
            beforeEmit: true
        }),

        new CopyWebpackPlugin([
            {
                from: `${appSettings.paths.assets}/img`,
                to: 'img',
                ignore: ['*.gitkeep']
            }
        ], {
            context: appSettings.context
        }),

        new webpack.ProvidePlugin({
            '$': 'jquery',
            'jQuery': 'jquery',
            'jquery': 'jquery'
        }),

        new MiniCssExtractPlugin({
            filename: `./css/[name].css`,
        })
    ]
}
