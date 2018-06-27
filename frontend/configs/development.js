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
        'es6-polyfill': path.join(appSettings.context, appSettings.paths.project.shopUiModule, './es6-polyfill.ts'),
        'vendor': path.join(appSettings.context, appSettings.paths.project.shopUiModule, './vendor.ts'),
        'app': [
            path.join(appSettings.context, appSettings.paths.project.shopUiModule, './app.ts'),
            path.join(appSettings.context, appSettings.paths.project.shopUiModule, './styles/basic.scss'),
            ...finder.findComponentEntryPoints(),
            path.join(appSettings.context, appSettings.paths.project.shopUiModule, './styles/util.scss')
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
                                path.join(appSettings.context, appSettings.paths.project.shopUiModule, './styles/shared.scss'),
                                ...finder.findComponentStyles()
                            ]
                        }
                    }
                ]
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
                from: `${appSettings.assets}/images/*`,
                to: './images/[name].[ext]',
                ignore: ['*.gitkeep']
            }, {
                from: `${appSettings.assets}/fonts/*`,
                to: './fonts/[name].[ext]',
                ignore: ['*.gitkeep']
            }
        ], {
            context: appSettings.context
        }),

        new MiniCssExtractPlugin({
            filename: `./css/${appSettings.name}.[name].css`,
        })
    ]
}
