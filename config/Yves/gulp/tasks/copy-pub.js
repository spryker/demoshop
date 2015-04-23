var gulp = require('gulp');
var path = require('path');
var config = require('../config.js');

gulp.task('copy-pub', function() {
    return gulp.src([
        path.join(config.paths.source.root, '*'),
        path.join(config.paths.source.root, '**/*.html'),
        //path.join(config.paths.source.root, '**/*.eot'),
        //path.join(config.paths.source.root, '**/*.svg'),
        //path.join(config.paths.source.root, '**/*.ttf'),
        //path.join(config.paths.source.root, '**/*.woff'),
        //path.join(config.paths.source.root, '**/*.jpg'),
    ], {
        dot : true,
        nodir : true
    })
        .pipe(gulp.dest(config.paths.dest.root));
});