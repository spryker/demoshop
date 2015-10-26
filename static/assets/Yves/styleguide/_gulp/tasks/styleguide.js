'use strict';

// TODO: cleanup

var gulp = require('gulp'),
    shell = require('gulp-shell'),
    watch = require('gulp-watch'),
    less = require('gulp-less'),
    path = require('path'),
    paths = require('../config').paths;


var notify = require('gulp-notify');


// parses all .less files and then generates styleguide using the template
gulp.task('styleguide', shell.task(
        ['./node_modules/.bin/kss-node <%= source %> <%= destination %> --template <%= template %> --helpers <%= helpers %>'],
        {
            templateData: {
                source: paths.source.styles.folder,
                template: paths.source.styleguide.template.folder,
                destination: paths.dest.styleguide,
                helpers: paths.source.styleguide.template.folder + '/helpers'
            }
        }
    )
);


gulp.task('styleguide:dev', ['styleguide', 'styleguide:watch']);


gulp.task('styleguide:watch', function () {
  gulp.watch([paths.source.styleguide.styles, paths.source.styleguide.template.files, paths.source.styles.files], ['styleguide']);
});