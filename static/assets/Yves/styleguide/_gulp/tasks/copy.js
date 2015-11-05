'use strict';

/**
* Copies from /assets/copy to /public
*/
var gulp = require('gulp'),
  paths = require('../config').paths,

  sequence = require('gulp-sequence'),
  _if = require('gulp-if'),
  gutil = require('gulp-util'),
  notify = require('gulp-notify');

var development = gutil.env.development;


gulp.task('copy', function (cb) {
  return gulp.src(paths.source.copy.files)
    .pipe(gulp.dest(paths.dest.folder))
    .pipe(_if(development, notify({
      message: 'Task "copy" completed',
      onLast: true
  })));
});

gulp.task('copy:dev', function (cb) {
    sequence(['copy', 'copy:watch'])(cb);
});

gulp.task('copy:watch', function (cb) {
    return gulp.watch([paths.source.copy.files], ['copy']);
});
