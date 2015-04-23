var config = require('../config.js');
var gulp = require('gulp');
var del = require('del');
var source = require('vinyl-source-stream');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var maps = require('gulp-sourcemaps');
var browserify  = require('browserify');
var jshint = require('gulp-jshint');
var mergeStreams = require('merge-stream');

gulp.task('scripts', function() {

  var browserified = browserify('./'+config.paths.source.scripts_entry)
      .bundle()
      .pipe(source('main.js'))
      .pipe(gulp.dest(config.paths.dest.scripts));

  var vendor = gulp.src(config.paths.source.scripts_vendor)
      .pipe(maps.init())
      .pipe(concat('vendor.js'))
      .pipe(uglify())
      .pipe(maps.write('./'))
      .pipe(gulp.dest(config.paths.dest.scripts));

  return mergeStreams(browserified, vendor);
});