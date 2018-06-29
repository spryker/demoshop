const merge = require('webpack-merge');
const config = require('./development');

module.exports = merge(config, {
    watch: true
})
