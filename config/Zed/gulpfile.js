var gulp        = require('gulp');
var uglify      = require('gulp-uglify');
var minifycss   = require('gulp-minify-css');
var rename      = require('gulp-rename');
var less        = require('gulp-less');
var concat      = require('gulp-concat');
var path        = require('path');
var del         = require('del');

var dirFeature = '../../vendor/spryker/spryker/Bundles/Gui/src/SprykerFeature/Zed/Gui/Static/Assets';
var dirPub = '../../static/public/Zed/bundles/';

var _match = /[^\/]+\/src\/SprykerFeature\/Zed\/([^\/]+)\/Static\/Public/;

function buildSource(type) {
    var source = {
        'css'    : 'styles/**/*.css',
        'js'     : 'scripts/**/*.js',
        'images' : 'images/**/*.{svg,png,jpeg,gif}',
        'fonts'  : 'fonts/**/*.{svg,woff,otf,ttf,eot}'
    };

    return [
        path.join(dirFeature, source[type])
    ];
}

function copy(directory) {
    var source = dirFeature + '/' + directory;
    var target = dirPub + '/Gui/' + directory;

    return gulp.src(source + '/**/*.*', {base: source})
        .pipe(gulp.dest(target));
}


gulp.task('compile-less', function(){
    return gulp.src(dirFeature + '/LESS/style.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(concat('style-gulp-new.css'))
        //.pipe(minifycss())
        .pipe(gulp.dest(dirFeature + '/styles'))
});

gulp.task('compile-js', function(){
    var jsFiles = [
        dirFeature + '/scripts/jquery-2.1.1.js',
        dirFeature + '/scripts/jquery-ui.custom.min.js',
        dirFeature + '/scripts/bootstrap.min.js',
        dirFeature + '/scripts/inspinia.js'
    ];
    return gulp.src(jsFiles)
        //.pipe(uglify())
        .pipe(concat('resources.min.js'))
        .pipe(gulp.dest(dirPub + '/Gui/scripts/'))
    ;
});

gulp.task('copy-fonts', function(){
    return copy('fonts');
});

gulp.task('copy-img', function(){
    return copy('img');
});

gulp.task('copy-sprites', function(){
    return copy('sprite');
});

gulp.task('copy-font-awesome', function(){
    return copy('font-awesome');
});

gulp.task('copy-css', function(){
    return copy('styles');
});

gulp.task('default', [
    'compile-less'
    ,'compile-js'
    ,'copy-fonts'
    ,'copy-font-awesome'
    ,'copy-img'
    ,'copy-sprites'
    ,'copy-css'
]);
