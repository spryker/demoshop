'use strict';

const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');

const cwd = process.cwd();
const sourcePath = './assets/Zed/';
const publicPath = '/assets/';
const sourceDir = path.join(cwd, sourcePath);
const publicDir = path.join(cwd, 'public/Zed', publicPath);

const bundlesPath = './vendor/spryker/spryker/Bundles/';
const bundlesDir = path.resolve(cwd, bundlesPath);
const guiPath = path.join(bundlesPath, 'Gui');
const guiFolder = path.basename(guiPath);

let configuration = {
    context: cwd,
    devtool: false,
    watch: false,
    stats: 'minimal',

    entry: {},

    output: {
        path: publicDir,
        filename: `/js/[name].js`
    },

    resolve: {
        modules: ['node_modules', sourcePath, bundlesPath],
        extensions: ['.js', '.css', '.scss'],
        alias: {
            ZedGui: `${guiFolder}/assets/Zed/js/modules/commons`,
            ZedGuiEditorConfiguration: `${guiFolder}/assets/Zed/js/modules/editor`,
            ZedGuiModules: `${guiFolder}/assets/Zed/js/modules`
        }
    },

    module: {
        rules: [{
            test: /\.css\??(\d*\w*=?\.?)+$/i,
            loader: ExtractTextPlugin.extract({
                fallbackLoader: 'style-loader',
                loader: [{
                    loader: 'css-loader',
                    query: {
                        sourceMap: true
                    }
                }, {
                    loader: 'resolve-url-loader',
                    query: {
                        sourceMap: true
                    }
                }]
            })
        }, {
            test: /\.scss$/i,
            loader: ExtractTextPlugin.extract({
                fallbackLoader: 'style-loader',
                loader: [{
                    loader: 'css-loader',
                    query: {
                        sourceMap: true
                    }
                }, {
                    loader: 'resolve-url-loader',
                    query: {
                        sourceMap: true
                    }
                }, {
                    loader: 'sass-loader',
                    query: {
                        sourceMap: true
                    }
                }]
            })
        }, {
            test: /\.(ttf|woff2?|eot|svg|otf)\??(\d*\w*=?\.?)+$/i,
            use: [{
                loader: 'file-loader',
                options: {
                    name: '/fonts/[name].[ext]',
                    publicPath: publicPath
                }
            }]
        }, {
            test: /\.(jpe?g|png|gif|svg)\??(\d*\w*=?\.?)+$/i,
            use: [{
                loader: 'file-loader',
                options: {
                    name: '/img/[name].[ext]',
                    publicPath: publicPath
                }
            }]
        }]
    },

    plugins: [
        new webpack.DefinePlugin({
            DEV: true,
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',

            // legacy provider
            SprykerAjax: `${guiFolder}/assets/Zed/js/modules/legacy/SprykerAjax`,
            SprykerAjaxCallbacks: `${guiFolder}/assets/Zed/js/modules/legacy/SprykerAjaxCallbacks`,
            SprykerAlert: `${guiFolder}/assets/Zed/js/modules/legacy/SprykerAlert`
        }),
        new ExtractTextPlugin({
            filename: 'css/[name].css',
            allChunks: true
        })
    ]
};

module.exports = {
    configuration
};
