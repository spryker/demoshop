var config = require('../config.js');
var gulp = require('gulp');
var del = require('del');

gulp.task('fonts', function(done) {
  // del([config.paths.dest.fonts + config.globs.fonts]);

  return gulp
    .src(config.paths.source.fonts)
    .pipe(gulp.dest(config.paths.dest.fonts));
});

