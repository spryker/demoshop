'use strict';

/**
 * Generation of stylesheets
 */
var gulp = require('gulp'),
    paths = require('../config').paths,

    sass = require('gulp-sass'),
    minifyCSS = require('gulp-minify-css'),
    prefix = require('gulp-autoprefixer'),
    path = require('path'),
    sourcemaps = require('gulp-sourcemaps'),
    plumber = require('gulp-plumber'),
    _if = require('gulp-if'),
    gutil = require('gulp-util'),
    notify = require('gulp-notify'),
    sequence = require('gulp-sequence');

var development = gutil.env.development;



gulp.task('styles', function (cb) {
    sequence(['styles:main', 'styles:styleguide'])(cb);
});

gulp.task('styles:dev', function (cb) {
    sequence(['styles', 'styles:watch'])(cb);
});



gulp.task('styles:watch', function () {
    return gulp.watch([paths.source.styles.files], ['styles']);
});

gulp.task('styles:main', function() {
    return generateStyles(paths.source.styles.main, 'main');
});

gulp.task('styles:styleguide', function() {
    return generateStyles(paths.source.styles.styleguide, 'styleguide');
});



function generateStyles (entry, title) {
    return gulp.src(entry)
      .pipe(plumber({
        errorHandler: notify.onError("Error: <%= error.message %>")
      }))
      .pipe(sourcemaps.init())
      .pipe(sass({
        includePaths: ['./' + paths.source.root + ' css']
      }))
      .pipe(minifyCSS())
      .pipe(prefix('last 2 versions'))
      .pipe(sourcemaps.write('./'))
      .pipe(gulp.dest(paths.dest.styles))
      .pipe(_if(development, notify({
        message: 'Task "styles:' + title + '" completed',
        onLast: true
      })));
}
