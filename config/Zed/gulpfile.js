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
var globby      = require('globby');

function Spryker() {
    this.bundlePrefix = 'vendor/spryker/spryker/Bundles/';
    this.bundleSufix = '/static/Assets';
    this.dirBundles = this.bundlePrefix + '*' + this.bundleSufix;
    this.dirFeature = this.bundlePrefix + 'Gui' + this.bundleSufix;
    this.dirPub = 'static/public/Zed/bundles';
    this.copy = function(directory){
        var source = this.dirFeature + '/' + directory;
        var target = this.dirPub + '/Gui/' + directory;

        return gulp.src(source + '/**/*.*', {base: source})
            .pipe(gulp.dest(target));
    };
    this.getBundleName = function(path) {
        path = path
            .replace(this.bundlePrefix, '')
            .replace(this.bundleSufix, '')
        ;

        return path;
    };
    this.copyBundles = function(done) {
        var that = this;
        globby(this.dirBundles, function(er, paths){
            paths.forEach(function(element){
                var target = that.dirPub + '/' + that.getBundleName(element) + '/';
                gulp.src(element + '/**/*.*', {base: element})
                    .pipe(gulp.dest(target));
            });
        });

        return done;
    };
    this.copyPublic = function(source) {
        var target = source.replace('assets', 'public');
        return gulp.src(source + '/**/*.*', {base: source})
            .pipe(gulp.dest(target));
    };
};

var spryker = new Spryker();

gulp.task('compile-less', ['copy-bundles'], function(){
    return gulp.src(spryker.dirPub + '/Gui/LESS/style.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(concat('style.min.css'))
        .pipe(minifycss())
        .pipe(gulp.dest(spryker.dirPub + '/Gui/styles'));
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
        .pipe(gulp.dest(spryker.dirPub + '/Gui/scripts/'));
});

/**
 * copy public files from bundles
 */
gulp.task('copy-bundles', ['clean-bundles'], function(done){
    return spryker.copyBundles(done);
});

/**
 * remove old code from static files
 */
gulp.task('clean-bundles', ['build-zed'], function(done){
    del(spryker.dirPub, done);
});

/**
 * Copy public directory
 */
gulp.task('build-zed', function(){
    return spryker.copyPublic('static/assets/Zed');
});

gulp.task('default', [
    'build-zed',
    'clean-bundles',
    'copy-bundles',
    'compile-less',
    'compile-js'
]);
