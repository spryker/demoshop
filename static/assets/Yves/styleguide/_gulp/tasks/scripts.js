'use strict';

/**
* Generation of bundled js files
*/
var gulp = require('gulp'),
  paths = require('../config').paths,

  jshint     = require('gulp-jshint'),
  browserify = require('browserify'),
  babelify   = require('babelify'),
  source     = require('vinyl-source-stream'),
  buffer     = require('vinyl-buffer'),
  uglify     = require('gulp-uglify'),
  sourcemaps = require('gulp-sourcemaps'),
  path       = require('path'),
  plumber    = require('gulp-plumber'),
  notify     = require('gulp-notify'),
  sequence   = require('gulp-sequence');

var debug = require('gulp-debug');


gulp.task('scripts', function (cb) {
    sequence(['scripts:hint', 'scripts:build'])(cb);
});

gulp.task('scripts:dev', function (cb) {
    sequence(['scripts', 'scripts:watch'])(cb);
});


gulp.task('scripts:watch', function () {
    return gulp.watch([paths.source.scripts.files], ['scripts']);
});

gulp.task('scripts:hint', function () {
    return gulp.src(paths.source.scripts.files)
        .pipe(jshint({ esnext: true }))
});


gulp.task('scripts:build', function () {
    return browserify({ entries : paths.source.scripts.entry })
        .transform(babelify.configure())
        .bundle()
        .on('error', notify.onError("Error: <%= error.message %>"))
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(source('main.js'))
        .pipe(buffer())
        // .pipe(sourcemaps.init())
        // .pipe(uglify())
        // .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(paths.dest.scripts))
        .pipe(notify('Task "scripts" completed'));
});