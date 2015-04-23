var gulp = require('gulp');
var path = require('path');
var config = require('../config.js');

gulp.task('copy-pub', function() {
    return gulp.src([
        path.join(config.paths.source.root, '*'),
        path.join(config.paths.source.root, '**/*.html')
    ], {
        dot : true
    })
        .pipe(gulp.dest(config.paths.dest.root));
});