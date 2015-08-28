/**
 * (c) Spryker Systems GmbH copyright protected
 */

'use strict';

var p = require('path');
var is = require('is_js');
var colors = require('colors');
var rjs = require('requirejs');
var stringFormat = require('string-format');
stringFormat.extend(String.prototype);

// var source = require('vinyl-source-stream');
// var browserify  = require('browserify');
// var maps = require('gulp-sourcemaps');

var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');
var imagemin = require('gulp-imagemin');

global.basePath = process.cwd();
var assetsPath = basePath + '/static/assets/Yves';
var publicPath = basePath + '/static/public/Yves';

var options = require('./lib/options');
var log = require('./lib/log');

var assets = {
    images: [
        assetsPath + '/images/*.{png,gif,jpg}',
        assetsPath + '/images/**/*.{png,gif,jpg}'
    ],
    fonts: [
        assetsPath + '/fonts/*.{eot,ttf,woff,woff2,otf}',
        assetsPath + '/fonts/**/*.{eot,ttf,woff,woff2,otf}'
    ],
    css: [
        assetsPath + '/styles/schemes/*.{scss,sass}'
    ],
    js: [
        assetsPath + '/js/*.js',
        assetsPath + '/js/**/*.js'
    ]
};

var tasks = {
    extra: function(mode) {
        gulp
            .src([
                assetsPath + '/**/*.html',
                assetsPath + '/*.php'
            ])
            .pipe(plumber(options.always.plumber))
            .pipe(gulp.dest(publicPath));
    },
    images: function(mode) {
        return gulp
            .src(assets.images)
            .pipe(plumber(options.always.plumber))
            .pipe(imagemin(options.always.imagemin))
            .pipe(gulp.dest(publicPath + '/images/'));
    },
    fonts: function(mode) {
        return gulp
            .src(assets.fonts)
            .pipe(plumber(options.always.plumber))
            .pipe(gulp.dest(publicPath + '/fonts/'));
    },
    css: function(mode) {
        return gulp
            .src(assets.css)
            .pipe(plumber(options.always.plumber))
            .pipe(autoprefixer(options.always.autoprefixer))
            .pipe(sass(options[mode].sassYves))
            .pipe(rename(options.always.renameYves))
            .pipe(gulp.dest(publicPath + '/css/'));
    },
    js: function(mode) {
        // var browserified = browserify(assetsPath + '/scripts/main.js')
        //     .bundle()
        //     .pipe(source('main.js'))
        //     .pipe(gulp.dest(publicPath + '/js/'));

        // var vendor = gulp.src(assetsPath + '/scripts/vendor/*.js')
        //     .pipe(maps.init())
        //     .pipe(concat('vendor.js'))
        //     .pipe(uglify())
        //     .pipe(maps.write('./'))
        //     .pipe(gulp.dest(publicPath + '/js/'));

        // return mergeStreams(browserified, vendor);

        rjs.optimize({
            optimize: mode === 'development' ? 'none' : 'uglify2',
            appDir: assetsPath + '/js',
            baseUrl: './',
            dir: publicPath + '/js',
			modules: [
				{name: 'schemes/category'},
				{name: 'schemes/pdp'},
				{name: 'schemes/tips'},
				{name: 'schemes/checkout'}
			]
        });
    }
};

function build(mode) {
    console.log('\n[ BUILD  ] building assets for {0}...'.format(mode).green);

    console.log('[ BUILD  ] copying extra...'.green);
    tasks.extra(mode);

    console.log('[ BUILD  ] copying fonts...'.green);
    tasks.fonts(mode);

    console.log('[ BUILD  ] copying images...'.green);
    tasks.images(mode);

    console.log('[ BUILD  ] building scss and copying css...'.green);
    tasks.css(mode);

    console.log('[ BUILD  ] uglifying js...'.green);
    tasks.js(mode);
}

gulp.task('dist', function() {
    console.log('\n[  SPRY  ] running DIST process for YVES...'.bgWhite.black.bold);

    build('distribution');
});

gulp.task('dev', function() {
    console.log('\n[  SPRY  ] running DEV process for YVES...'.bgWhite.black.bold);

    build('development');

    console.log('[ WATCH  ] watching (s)css...'.yellow);
    gulp.watch([
        assetsPath + '/js/components/*.js',
        assetsPath + '/js/components/**/*.js',
        assetsPath + '/js/schemes/*.js',
        assetsPath + '/js/schemes/**/*.js'
    ], {}, function(event) {
        tasks.js('development');
        log.change('[   JS   ]', 'file', event);
    });

    console.log('[ WATCH  ] watching js...'.yellow);
    gulp.watch([
        assetsPath + '/styles/*.{css,scss,sass}',
        assetsPath + '/styles/**/*.{css,scss,sass}'
    ], {}, function(event) {
        tasks.css('development');
        log.change('[  sCSS  ]', 'style file', event);
    });
});

gulp.task('default', function() {
    gulp.start('dist');
});
