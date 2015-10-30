'use strict';

var gulp = require('gulp'),
    config = require('./_gulp/config'),
    paths = config.paths;

var sequence = require('gulp-sequence');


require('require-dir')('./_gulp/tasks', {
    recurse : true
});


gulp.task('dev', sequence(['styles:dev', 'scripts:dev', 'styleguide:dev', 'copy:dev', 'iconfont']));

gulp.task('dist', sequence(['styles', 'scripts', 'styleguide', 'copy', 'iconfont']));

gulp.task('default', ['dist']);
