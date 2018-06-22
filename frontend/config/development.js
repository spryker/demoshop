// custom development config factory

const path = require('path');
const builder = require('@spryker/suite-frontend-builder');

// this custom config factory implements a basic asset management strategy using copy-webpack-plugin
// modify this file to change and/or remove it
const CopyWebpackPlugin = require('copy-webpack-plugin');

// builder.factory.register associate a mode (development) to a specific config factory
// by extending the default config factory and assigning it to development mode
// your changes are going to be applied in all modes that relies on development one
// i.e. development-watch and production
builder.factory.register('development', () => class extends builder.factory.default.Development {
    getCleanWebpackPluginPaths() {
        const paths = super.getCleanWebpackPluginPaths();

        return [
            ...paths,
            'images',
            'fonts'
        ]
    }

    getCopyWebpackPluginPatterns() {
        return [
            {
                from: './frontend/assets/images/*',
                to: './images/[name].[ext]',
                ignore: ['*.gitkeep']
            }, {
                from: './frontend/assets/fonts/*',
                to: './fonts/[name].[ext]',
                ignore: ['*.gitkeep']
            }
        ]
    }

    getLiveReloadWebpackPluginOptions() {
        return {
            context: this.settings.context
        }
    }

    getCopyWebpackPluginOptions() {
        return {
            appendScriptTag: true
        }
    }

    create() {
        const config = super.create();

        return {
            ...config,
            // extend your webpack configuration here

            plugins: [
                ...config.plugins,
                new CopyWebpackPlugin(this.getCopyWebpackPluginPatterns(), this.getCopyWebpackPluginOptions())
            ]
        }
    }
})
