const webpack = require('webpack');
const merge = require('webpack-merge');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const config = require('./development');

const mergeWithStrategy = merge.smartStrategy({
    plugins: 'prepend'
});

module.exports = mergeWithStrategy(config, {
    mode: 'production',
    devtool: false,

    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: true,
                parallel: true,
                sourceMap: false,
                uglifyOptions: {
                    output: {
                        comments: false,
                        beautify: false
                    }
                }
            }),

            new OptimizeCSSAssetsPlugin({
                cssProcessorOptions: {
                    discardEmpty: true,
                    discardComments: {
                        removeAll: true
                    }
                }
            })
        ]
    },

    plugins: [
        new webpack.DefinePlugin({
            __PRODUCTION__: true
        })
    ]
})
