'use strict';

const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');

const themeName = 'default';
const cwd = process.cwd();
const sourcePath = './assets/Yves/' + themeName;
const publicPath = '/assets/' + themeName;
const sourceDir = path.join(cwd, sourcePath);
const publicDir = path.join(cwd, 'public/Yves', publicPath);

let configuration = {
    context: cwd,
    devtool: false,
    watch: false,
    stats: 'minimal',

    entry: {
        'vendor': path.join(sourceDir, 'vendor.entry.js'),
        'app': path.join(sourceDir, 'app.entry.js')
    },

    output: {
        path: publicDir,
        filename: `/js/[name].js`
    },

    resolve: {
        modules: ['node_modules', sourcePath],
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
        }]
    },

    plugins: [
        new webpack.DefinePlugin({
            DEV: true,
        }),
        new ExtractTextPlugin({
            filename: 'css/[name].css'
        }),
        new CopyPlugin([{
            from: path.resolve(sourceDir, 'img'),
            to: 'img'
        }])
    ]
};

module.exports = {
    configuration
};
