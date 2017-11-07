const oryx = require('@spryker/oryx');
const oryxForZed = require('@spryker/oryx-for-zed');
const path = require('path');

const myCustomZedSettings = Object.assign({}, oryxForZed.settings, {
    entry: {
        dirs: [
            path.resolve('./vendor/spryker'),
            path.resolve('./assets')
        ],
        patterns: ['**/Zed/**/*.entry.js'],
        description: 'looking for entry points...',
        defineName: p => path.basename(p, '.entry.js')
    }
});

const configuration = oryxForZed.getConfiguration(myCustomZedSettings);

oryx.build(configuration);