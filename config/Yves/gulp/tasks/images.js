var config = require('../config.js');
var gulp = require('gulp');
var del = require('del');

gulp.task('clean-images', function(done) {
    del([config.paths.dest.images + config.globs.images], done);
})

gulp.task('images', ['clean-images'], function(done) {
  return gulp
    .src(config.paths.source.images)
    .pipe(gulp.dest(config.paths.dest.images));
});

