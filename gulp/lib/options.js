/**
 * (c) Spryker Systems GmbH copyright protected
 */

'use strict';

var notifier = require('node-notifier');
var pngquant = require('imagemin-pngquant');

var development = {
    uglify: {
        mangle: false,
        compress: {
            global_defs: {
                DEBUG: true
            }
        },
        output: {
            beautify: true,
            bracketize: true,
            semicolons: true
        }
    },
    sassZed: {
        outputStyle: 'expanded'
    },
    sassYves: {
        outputStyle: 'expanded',
        includePaths: [basePath + '/static/assets/Yves/style']
    }
};

var distribution = {
    uglify: {
        mangle: true,
        compress: {
            global_defs: {
                DEBUG: false
            }
        },
        output: {
            beautify: false,
            bracketize: false,
            semicolons: true
        }
    },
    sassZed: {
        outputStyle: 'compressed'
    },
    sassYves: {
        outputStyle: 'compressed',
        includePaths: [basePath + '/static/assets/Yves/style']
    }
};

var always = {
    plumber: {
        errorHandler: function(err) {
            var subject = !!err.plugin ? 'Plugin ' + err.plugin : 'Main task';
            var filename = (err.fileName || 'file').replace(basePath, '');
            console.error('[  ERR!  ] {0}: {1}\n{2}'.format(subject, filename, err.message).red);

            notifier.notify({
                title: 'ZED error (gulp)',
                message: '{0} {1}'.format(subject, filename),
                sound: true,
                wait: true
            }, function(err, response) {});
        }
    },
    autoprefixer: {
        browsers: ['last 15 versions'],
        cascade: false
    },
    renameZed: {
        dirname: '/'
    },
    renameYves: {
        dirname: '/',
        suffix: '.min'
    },
    imagemin: {
        progressive: true,
        svgoPlugins: [{
            removeViewBox: false
        }],
        use: [pngquant()]
    }
};

module.exports = {
    distribution: distribution,
    development: development,
    always: always
};
