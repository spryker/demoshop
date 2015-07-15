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
var globby        = require('globby');

var dirBundles = 'vendor/spryker/spryker/Bundles/*/static/Assets';
var dirFeature = 'vendor/spryker/spryker/Bundles/Gui/static/Assets';
var dirPub = 'static/public/Zed/bundles';

function copy(directory) {
    var source = dirFeature + '/' + directory;
    var target = dirPub + '/Gui/' + directory;

    return gulp.src(source + '/**/*.*', {base: source})
        .pipe(gulp.dest(target));
}

function getBundleName(path) {
    path = path
        .replace('vendor/spryker/spryker/Bundles/', '')
        .replace('/static/Assets', '')
    ;

    return path;
}

function copyBundles(done) {
    globby(dirBundles, function(er, paths){
        paths.forEach(function(element){
            gulp.src(element + '/**/*.*', {base: element})
                .pipe(gulp.dest(dirPub + '/' + getBundleName(element) + '/'));
        });
    });

    return done;
}

function copyPublic(source) {
    var target = source.replace('assets', 'public');
    return gulp.src(source + '/**/*.*', {base: source})
        .pipe(gulp.dest(target));
}

gulp.task('compile-less', ['copy-bundles'], function(){
    return gulp.src(dirPub + '/Gui/LESS/style.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(concat('style.min.css'))
        .pipe(minifycss())
        .pipe(gulp.dest(dirPub + '/Gui/styles'));
});

gulp.task('compile-js', ['copy-bundles'], function(){
    var jsFiles = [
        dirPub + '/Gui/scripts/jquery-2.1.1.js',
        dirPub + '/Gui/scripts/bootstrap.min.js',
        dirPub + '/Gui/scripts/plugins/metisMenu/jquery.metisMenu.js',
        dirPub + '/Gui/scripts/plugins/footable/footable.all.min.js',
        dirPub + '/Gui/scripts/plugins/slimscroll/jquery.slimscroll.min.js',
        dirPub + '/Gui/scripts/inspinia.js',
        dirPub + '/Gui/scripts/plugins/dataTables/jquery.dataTables.js',
        dirPub + '/Gui/scripts/plugins/dataTables/dataTables.bootstrap.js',
        dirPub + '/Gui/scripts/plugins/dataTables/dataTables.responsive.js',
        dirPub + '/Gui/scripts/plugins/dataTables/dataTables.tableTools.min.js',
        dirPub + '/Gui/scripts/sprykerPlugins/**/*.js',
        dirPub + '/Gui/scripts/spryker.js'
    ];
    return gulp.src(jsFiles)
        .pipe(uglify())
        .pipe(concat('resources.min.js'))
        .pipe(gulp.dest(dirPub + '/Gui/scripts/'));
});

/**
 * copy tasks
 */
gulp.task('copy-bundles', ['clean-bundles'], function(done){
    return copyBundles(done);
});

/**
 * clean libraries
 */
gulp.task('clean-bundles', ['build-zed'], function(done){
    del(dirPub, done);
});

/**
 * Build tasks
 */
gulp.task('build-zed', function(){
    return copyPublic('static/assets/Zed');
});

gulp.task('default', [
    'build-zed',
    'clean-bundles',
    'copy-bundles',
    'compile-less',
    'compile-js'
]);
