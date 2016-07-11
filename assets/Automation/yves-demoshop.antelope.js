/**
 * Demoshop theme comfiguration
 */

'use strict';

const path = require('path');
const cwd = process.cwd();

const R = antelope.remote('ramda');
const webpack = antelope.remote('webpack');
const ExtractTextPlugin = antelope.remote('extract-text-webpack-plugin');

let style = new ExtractTextPlugin('assets/demoshop/css/[name].css', {
    allChunks: true
});

let cssOptions = !!antelope.options.production ? '?sourceMap' : '';

let config = {
    entry: antelope.entryPoints,
    resolve: {
        root: antelope.paths.root,
    },
    resolveLoader: {
        root: antelope.paths.loaders
    },
    output: {
        path: path.join(cwd, './public/Yves'),
        filename: '/assets/demoshop/js/[name].js'
    },
    module: {
        loaders: [{
            test: /\.css\??(\d*\w*=?\.?)+$/i,
            loader: style.extract([
                'css' + cssOptions
            ])
        }, {
            test: /\.scss$/i,
            loader: style.extract([
                'css' + cssOptions,
                'sass'
            ])
        }, {
            test: /\.(ttf|woff2?|eot)\??(\d*\w*=?\.?)+$/i,
            loader: 'file?name=/assets/demoshop/fonts/[name].[ext]'
        }, {
            test: /\.(jpe?g|png|gif|svg)\??(\d*\w*=?\.?)+$/i,
            loader: 'organizer?rules=images',
        }, {
            test: /(DISCLAIMER|LICENSE|README)/i,
            loader: 'organizer?rules=legal',
        }]
    },
    sassLoader: {
        includePaths: antelope.paths.loaders,
        sourceMap: !!antelope.options.production,
        sourceComments: false,
        outputStyle: antelope.options.production ? 'compressed' : 'expanded'
    },
    organizerRules: {
        images: [{
            container: /fonts\//,
            name: '/assets/demoshop/fonts/[name].[ext]'
        }, {
            container: /node_modules\//,
            name: '/assets/demoshop/img/modules/[bundle]/[name].[ext]'
        }, {
            container: /icecat\//,
            name: '/assets/demoshop/img/icecat/[name].[ext]'
        }, {
            name: '/assets/demoshop/img/[name].[ext]'
        }],
        legal: [{
            container: /icecat\//,
            name: '/assets/demoshop/img/icecat/[name]'
        }]
    },
    plugins: [
        style,
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        }),
        new webpack.DefinePlugin({
            PRODUCTION: antelope.options.production,
            WATCH: antelope.options.watch
        }),
        new ExtractTextPlugin('assets/demoshop/css/[name].css', {
            allChunks: true
        }),
    ],
    watchOptions: {
        aggregateTimeout: 10,
        poll: 100
    },
    progress: true,
    failOnError: false,
    devtool: antelope.options.production ? 'source-map' : false,
    debug: antelope.options.debug,
    watch: antelope.options.watch
};

if (antelope.options.production) {
    config.plugins = config.plugins.concat([
        new webpack.optimize.UglifyJsPlugin({
            comments: false,
            sourceMap: true,
            compress: {
                warnings: false
            },
            mangle: {
                except: ['$', 'exports', 'require']
            }
        })
    ]);
}

module.exports = config;
