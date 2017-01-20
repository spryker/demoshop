'use strict';

const path = require('path')
const autoprefixer = antelope.remote('autoprefixer')
const webpack = antelope.remote('webpack')
const ExtractTextPlugin = antelope.remote('extract-text-webpack-plugin')
const CopyPlugin = require('copy-webpack-plugin')
const cwd = process.cwd()
const themeName = 'default'

let style = new ExtractTextPlugin(`assets/${themeName}/css/[name].css`)
let nojs = new ExtractTextPlugin(`assets/${themeName}/css/nojs.css`)
let cssOptions = antelope.options.production ? '' : '?sourceMap';

let config = {
    cwd: cwd,
    entry: Object.assign({
        'vendor': path.join(cwd, `./assets/Yves/${themeName}/vendor.entry.js`),
        'app': path.join(cwd, `./assets/Yves/${themeName}/app.entry.js`)
    }, antelope.entryPoints),
    resolve: {
        root: [
            ...antelope.paths.root,
            path.join(cwd, `./assets/Yves/${themeName}`)
        ],
        extensions: ['', '.js', '.scss']
    },
    resolveLoader: {
        root: antelope.paths.loaders
    },
    module: {
        loaders: [{
            test: /\.css\??(\d*\w*=?\.?)+$/i,
            loader: style.extract([
                'css' + cssOptions
            ])
        }, {
            test: /\.scss$/i,
            exclude: /.*nojs.*/i,
            loader: style.extract([
                'css' + cssOptions,
                'postcss' + cssOptions,
                'sass'
            ])
        }, {
            test: /\.(ttf|woff2?|eot|svg|otf)\??(\d*\w*=?\.?)+$/i,
            loader: `file?name=/assets/${themeName}/fonts/[name].[ext]`
        }]
    },
    postcss: () => [],
    sassLoader: {
        outputStyle: antelope.options.production ? 'compressed' : 'expanded',
        sourceMap: !antelope.options.production
    },
    output: {
        path: path.join(cwd, './public/Yves'),
        filename: `/assets/${themeName}/js/[name].js`
    },
    plugins: [
        style,
        nojs,
        new webpack.DefinePlugin({
            DEV: !antelope.options.production,
            'process.env': {
                'NODE_ENV': antelope.options.production ? '"production"' : '"development"'
            }
        }),
        new CopyPlugin([
            {
                from: `${cwd}/assets/Yves/${themeName}/img`,
                to: `assets/${themeName}/img`
            }
        ])
    ],
    watchOptions: {
        aggregateTimeout: 10,
        poll: 10
    },
    devtool: antelope.options.production ? false : 'source-map',
    watch: antelope.options.watch
}

if (antelope.options.production) {
    config.postcss = () => [
        autoprefixer({
            browsers: ['last 4 versions']
        })
    ]

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
    ]
}

module.exports = config
