'use strict';

/**
* Copies from /assets/copy to /public
*/
var gulp = require('gulp'),
  paths = require('../config').paths;

var sequence = require('gulp-sequence'),
    notify = require('gulp-notify');



gulp.task('copy', function (cb) {
  return gulp.src(paths.source.copy.files)
    .pipe(gulp.dest(paths.dest.folder))
    .pipe(notify({
      message: 'Task "copy" completed',
      onLast: true
  }));
});

gulp.task('copy:dev', function (cb) {
    sequence(['copy', 'copy:watch'])(cb);
});

gulp.task('copy:watch', function (cb) {
    return gulp.watch([paths.source.copy.files], ['copy']);
});
