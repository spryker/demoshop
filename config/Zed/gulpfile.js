/**
 * run this script by running the following command in root folder
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

var dirFeature = 'vendor/spryker/spryker/Bundles/Gui/src/SprykerFeature/Zed/Gui/Static/Assets';
var dirPub = 'static/public/Zed/bundles/';

function copy(directory) {
    var source = dirFeature + '/' + directory;
    var target = dirPub + '/Gui/' + directory;

    return gulp.src(source + '/**/*.*', {base: source})
        .pipe(gulp.dest(target));
}

gulp.task('compile-less', ['copy-less'], function(){
    return gulp.src(dirPub + 'Gui/LESS/style.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(concat('style.min.css'))
        //.pipe(minifycss())
        .pipe(gulp.dest(dirPub + 'Gui/styles'))
});

gulp.task('compile-js', ['copy-js'], function(){
    var jsFiles = [
        dirPub + 'Gui/scripts/jquery-2.1.1.js',
        dirPub + 'Gui/scripts/bootstrap.min.js',
        dirPub + 'Gui/scripts/plugins/metisMenu/jquery.metisMenu.js',
        dirPub + 'Gui/scripts/plugins/footable/footable.all.min.js',
        dirPub + 'Gui/scripts/plugins/slimscroll/jquery.slimscroll.min.js',
        dirPub + 'Gui/scripts/inspinia.js'
    ];
    return gulp.src(jsFiles)
        .pipe(uglify())
        .pipe(concat('resources.min.js'))
        .pipe(gulp.dest(dirPub + '/Gui/scripts/'))
    ;
});

/**
 * copy tasks
 */
gulp.task('copy-fonts', function(){
    return copy('fonts');
});

gulp.task('copy-sprites', function(){
    return copy('sprite');
});

gulp.task('copy-js', function(){
    return copy('scripts');
});

gulp.task('copy-font-awesome', function(){
    return copy('font-awesome');
});

gulp.task('copy-css', function(){
    return copy('styles');
});

gulp.task('copy-less', function(){
    return copy('LESS');
});

/**
 * clean libraries
 */
gulp.task('clean-css', function(done){
    del(dirPub + 'Gui/styles', done);
});

gulp.task('clean-less', function(done){
    del(dirPub + 'Gui/LESS', done);
});

gulp.task('clean-fonts', function(done){
    del(dirPub + 'Gui/fonts', done);
});

gulp.task('clean-font-awesome', function(done){
    del(dirPub + 'Gui/font-awesome', done);
});

gulp.task('clean-sprite', function(done){
    del(dirPub + 'Gui/sprite', done);
});

gulp.task('clean-js', function(done){
    del(dirPub + 'Gui/scripts', done);
});

gulp.task('clean-gui', function(done){
    del(dirPub + 'Gui', done);
});

gulp.task('clean-bundles', function(done){
    del(dirPub, done);
});

/**
 * Tasks groups
 */
gulp.task('copy-files', [
    'copy-css'
    ,'copy-less'
    ,'copy-fonts'
    ,'copy-font-awesome'
    ,'copy-sprites'
    ,'copy-js'
]);

gulp.task('clean-files', [
    'clean-css'
    ,'clean-less'
    ,'clean-fonts'
    ,'clean-font-awesome'
    ,'clean-sprite'
    ,'clean-js'
    ,'clean-gui'
    ,'clean-bundles'
]);

gulp.task('default', [
    'clean-files'
    ,'copy-files'
    ,'compile-less'
    ,'compile-js'
]);
