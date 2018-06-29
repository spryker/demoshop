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
        'es6-polyfill': path.join(appSettings.context, appSettings.paths.app, './es6-polyfill.js'),
        'vendor': path.join(appSettings.context, appSettings.paths.app, './vendor.js'),
        'app': [
            path.join(appSettings.context, appSettings.paths.app, './app.js'),
            path.join(appSettings.context, appSettings.paths.app, './styles/basic.scss'),
            ...finder.findComponentEntryPoints(),
            path.join(appSettings.context, appSettings.paths.app, './styles/util.scss')
        ]
    },

    output: {
        path: path.join(appSettings.context, appSettings.paths.public),
        publicPath: `${appSettings.urls.assets}/`,
        filename: `./js/${appSettings.name}.[name].js`,
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
                                path.join(appSettings.context, appSettings.paths.app, './styles/shared.scss'),
                                ...finder.findComponentStyles()
                            ]
                        }
                    }
                ]
            }, {
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
                from: `${appSettings.paths.assets}/images`,
                to: 'img',
                ignore: ['*.gitkeep']
            }, {
                from: `${appSettings.paths.assets}/fonts`,
                to: 'fonts',
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
            filename: `./css/${appSettings.name}.[name].css`,
        })
    ]
}
