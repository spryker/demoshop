/**
 * run this script with the following command in root folder
 *
 * npm run spy-task-zed
 *
 * or manual
 *
 * npm install && gulp --gulpfile config/Zed/gulpfile.js --cwd .
 *
 */

var gulp        = require('gulp');
var uglify      = require('gulp-uglify');
var minifycss   = require('gulp-minify-css');
var rename      = require('gulp-rename');
var less        = require('gulp-less');
var concat      = require('gulp-concat');
var path        = require('path');
var del         = require('del');

var dirFeature = 'vendor/spryker/spryker/Bundles/Gui/static/Assets';
var dirPub = 'static/public/Zed/bundles';

function copy(directory) {
    var source = dirFeature + '/' + directory;
    var target = dirPub + '/Gui/' + directory;

    return gulp.src(source + '/**/*.*', {base: source})
        .pipe(gulp.dest(target));
}

function copyPublic(source) {
    var target = source.replace('assets', 'public');
    return gulp.src(source + '/**/*.*', {base: source})
        .pipe(gulp.dest(target));
}

gulp.task('compile-less', ['copy-less'], function(){
    return gulp.src(dirPub + '/Gui/LESS/style.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(concat('style.min.css'))
        .pipe(minifycss())
        .pipe(gulp.dest(dirPub + '/Gui/styles'));
});

gulp.task('compile-js', ['copy-js'], function(){
    var jsFiles = [
        dirPub + '/Gui/scripts/jquery-2.1.1.js',
        dirPub + '/Gui/scripts/bootstrap.min.js',
        dirPub + '/Gui/scripts/plugins/metisMenu/jquery.metisMenu.js',
        dirPub + '/Gui/scripts/plugins/footable/footable.all.min.js',
        dirPub + '/Gui/scripts/plugins/slimscroll/jquery.slimscroll.min.js',
        dirPub + '/Gui/scripts/inspinia.js'
    ];
    return gulp.src(jsFiles)
        .pipe(uglify())
        .pipe(concat('resources.min.js'))
        .pipe(gulp.dest(dirPub + '/Gui/scripts/'));
});

/**
 * copy tasks
 */
gulp.task('copy-fonts', ['clean-fonts'], function(done){
    return copy('fonts', done);
});

gulp.task('copy-sprites', ['clean-sprite'], function(done){
    return copy('sprite', done);
});

gulp.task('copy-js', ['clean-js'], function(done){
    return copy('scripts', done);
});

gulp.task('copy-font-awesome', ['clean-font-awesome'], function(done){
    return copy('font-awesome', done);
});

gulp.task('copy-css', ['clean-css'], function(done){
    return copy('styles', done);
});

gulp.task('copy-less', ['clean-less'], function(done){
    return copy('LESS', done);
});

/**
 * clean libraries
 */
gulp.task('clean-css', ['build-public'], function(done){
    del(dirPub + '/Gui/styles', done);
});

gulp.task('clean-less', ['build-public'], function(done){
    del(dirPub + '/Gui/LESS', done);
});

gulp.task('clean-fonts', ['build-public'], function(done){
    del(dirPub + '/Gui/fonts', done);
});

gulp.task('clean-font-awesome', ['build-public'], function(done){
    del(dirPub + '/Gui/font-awesome', done);
});

gulp.task('clean-sprite', ['build-public'], function(done){
    del(dirPub + '/Gui/sprite', done);
});

gulp.task('clean-js', ['build-public'], function(done){
    del(dirPub + '/Gui/scripts', done);
});

gulp.task('clean-gui', ['build-public'], function(done){
    del(dirPub + '/Gui', done);
});

gulp.task('clean-bundles', ['build-public'], function(done){
    del(dirPub, done);
});

/**
 * Build tasks
 */
gulp.task('build-zed', function(){
    return copyPublic('static/assets/Zed');
});

/**
 * Tasks groups
 */
gulp.task('build-public', [
    'build-zed'
]);
gulp.task('copy-files', [
    'copy-css',
    'copy-less',
    'copy-fonts',
    'copy-font-awesome',
    'copy-sprites',
    'copy-js'
]);

gulp.task('clean-files', [
    'clean-css',
    'clean-js',
    'clean-less',
    'clean-fonts',
    'clean-font-awesome',
    'clean-sprite'
]);


gulp.task('default', [
    'build-public',
    'clean-files',
    'copy-files',
    'compile-less',
    'compile-js'
]);
