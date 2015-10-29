'use strict';

var gulp = require('gulp'),
    config = require('./_gulp/config'),
    paths = config.paths;

var sequence = require('gulp-sequence');


require('require-dir')('./_gulp/tasks', {
    recurse : true
});


gulp.task('dev', sequence(['styles:dev', 'styleguide:dev', 'copy:dev']));

gulp.task('dist', sequence(['styles', 'styleguide', 'copy']));

gulp.task('default', ['dist']);
