
'use strict';

var p = require('path');
var R = require('ramda');
var is = require('is_js');
var argv = require('yargs').argv;
var glob = require('glob');
var colors = require('colors');
var stringFormat = require('string-format');
stringFormat.extend(String.prototype);

var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var handlebars = require('gulp-handlebars');
var wrap = require('gulp-wrap');
var declare = require('gulp-declare');

global.basePath = process.cwd();
var assetsPath = basePath + '/static/assets/Zed';
var publicPath = basePath + '/static/public/Zed';

var options = require('./lib/options');
var assets = require('./lib/assets');
var log = require('./lib/log');

var tasks = {
    extra: function() {
        return gulp
            .src([
                '!' + assetsPath + '/bundles/*.*',
                '!' + assetsPath + '/bundles/**/*.*',
                '!' + assetsPath + '/*.json',
                assetsPath + '/*.*',
                assetsPath + '/**/*.*'
            ])
            .pipe(plumber(options.always.plumber))
            .pipe(gulp.dest(publicPath));
    },
    images: function(src, mode) {
        return gulp
            .src(src)
            .pipe(plumber(options.always.plumber))
            .pipe(rename(options.always.renameZed))
            .pipe(gulp.dest(publicPath + '/bundles/images/'));
    },
    fonts: function(src, mode) {
        return gulp
            .src(src)
            .pipe(plumber(options.always.plumber))
            .pipe(rename(options.always.renameZed))
            .pipe(gulp.dest(publicPath + '/bundles/fonts/'));
    },
    css: function(src, mode, target) {
        return gulp
            .src(src)
            .pipe(plumber(options.always.plumber))
            .pipe(sass(options[mode].sassZed))
            .pipe(concat('style.{0}.min.css'.format(target)))
            .pipe(gulp.dest(publicPath + '/bundles/css/'));
    },
    templates: function(src, mode, target) {
        return gulp
            .src(src)
            .pipe(plumber(options.always.plumber))
            .pipe(handlebars())
            .pipe(wrap('Handlebars.template(<%= contents %>)'))
            .pipe(declare({
                noRedeclare: true,
            }))
            .pipe(uglify(options[mode].uglify))
            .pipe(concat('templates.{0}.min.js'.format(target)))
            .pipe(gulp.dest(publicPath + '/bundles/js/'));
    },
    js: function(src, mode, target) {
        return gulp
            .src(src)
            .pipe(plumber(options.always.plumber))
            .pipe(uglify(options[mode].uglify))
            .pipe(concat('resources.{0}.min.js'.format(target)))
            .pipe(gulp.dest(publicPath + '/bundles/js/'));
    }
};

function build(mode, target) {
    var map = assets.map(target);

    console.log('\n[ BUILD  ] building'.green, '{0}'.format(target).cyan.bold, 'assets for {0}...'.format(mode).green);
    console.log('[ BUILD  ] copying fonts...'.green);
    tasks.fonts(map.fonts, mode);

    console.log('[ BUILD  ] creating dummies assets...'.green);
    tasks.css(__dirname + '/dummy/style.css', mode, target);
    tasks.templates(__dirname + '/dummy/template.hbs', mode, target);
    tasks.js(__dirname + '/dummy/scripts.js', mode, target);

    console.log('[ BUILD  ] copying images...'.green);
    tasks.images(map.images, mode);

    console.log('[ BUILD  ] building scss and copying css...'.green);
    tasks.css(map.css, mode, target);

    console.log('[ BUILD  ] compiling hbs templates...'.green);
    tasks.templates(map.templates, mode, target);

    console.log('[ BUILD  ] uglifying js...'.green);
    tasks.js(map.js, mode, target);
}

gulp.task('dist', function() {
    console.log('\n[  SPRY  ] running DIST process for ZED...'.bgWhite.black.bold);

    console.log('\n[  COPY  ] copying extra static assets...'.green);
    tasks.extra();

    build('distribution', 'external');
    build('distribution', 'internal');
    build('distribution', 'custom');
});

gulp.task('dev', function() {
    console.log('\n[  SPRY  ] running DEV process for ZED...'.bgWhite.black.bold);
    var target = is.string(argv.target) ? argv.target : false;

    console.log('\n[  COPY  ] copying extra static assets...'.green);
    tasks.extra();

    build('development', 'external');
    build('development', 'internal');
    build('development', 'custom');

    if (target) {
        var bundle = !!argv.bundle && is.string(argv.bundle) ? argv.bundle : '*';
        var map = assets.map(target, bundle);
        console.log('\n[ WATCH  ] target:'.yellow, 'assets.{0}.{1}.json'.format(target, bundle).magenta.bold);

        if (map.empty) {
            console.log("[ WATCH  ] this assets file doesn't exist: nothing to watch".red);
            console.log("[  INFO  ] run 'npm run spy-assets' to see the list of available assets files".red);
        } else {
            console.log('[ WATCH  ] watching'.yellow, '{0}'.format(target).cyan.bold, 'hbs...'.yellow);
            gulp.watch(map.templates, {}, function(event) {
                tasks.templates(map.templates, 'development', target);
                log.change('[  HBS   ]', 'template', event);
            });

            console.log('[ WATCH  ] watching'.yellow, '{0}'.format(target).cyan.bold, 'js...'.yellow);
            gulp.watch(map.css, {}, function(event) {
                tasks.css(map.css, 'development', target);
                log.change('[  sCSS  ]', 'stylesheet', event);
            });

            console.log('[ WATCH  ] watching'.yellow, '{0}'.format(target).cyan.bold, '(s)css...'.yellow);
            gulp.watch(map.js, {}, function(event) {
                tasks.js(map.js, 'development', target);
                log.change('[   JS   ]', 'sctipt', event);
            });
        }
    }
});

gulp.task('assets', function() {
    console.log('\nListing all the assets files in the project...'.yellow);

    var assets = glob.sync(basePath + '/**/assets.*.*.json');
    assets.forEach(function(asset) {
        console.log(asset.replace(basePath, ''));
    });

    console.log('{0} files found\n'.format(assets.length).yellow);
});

gulp.task('all', function() {
    gulp.start('dist');
});

gulp.task('default', function() {
    gulp.start('dist');
});
