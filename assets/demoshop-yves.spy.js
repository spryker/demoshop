/**
 * 
 * description_here
 * @copyright: Spryker Systems GmbH
 *
 */

'use strict';

let path = require('path');
let cwd = process.cwd();

module.exports = {
    extend: (config, options, spyRequire) => {
    	let R = spyRequire('ramda');
    	let webpack = spyRequire('webpack');
    	let ExtractTextPlugin = spyRequire('extract-text-webpack-plugin');

        var defaultThemeConfig = {
        	module: {
                loaders: [{
                    test: /\.css(\?v=\d+\.\d+\.\d+)?$/i,
                    loader: ExtractTextPlugin.extract('style', 'css')
                }, {
                    test: /\.scss$/,
                    loader: ExtractTextPlugin.extract('style', 'css!sass')
                }, {
                    test: /\.(ttf|woff2?|eot)\??(\d*\w*=?)+$/i,
                    loader: 'file?name=/assets/demoshop/fonts/[name].[ext]'
                }, {
                    test: /\.(jpe?g|png|gif|svg)\??(\d*\w*=?)+$/i,
                    loader: 'file?name=/assets/demoshop/img/[name].[ext]',
                }]
            },
            output: {
                path: path.join(cwd, './public/Yves'),
                filename: '/assets/demoshop/js/[name].js'
            },
            plugins: [
                new ExtractTextPlugin('assets/demoshop/css/[name].css', {
                    allChunks: true
                })
            ],
        };

        return R.merge(config, defaultThemeConfig);
    }
};

