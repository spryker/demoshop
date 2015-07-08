var gulp        = require('gulp');
var uglify      = require('gulp-uglify');
var minifycss   = require('gulp-minify-css');
var rename      = require('gulp-rename');
var less        = require('gulp-less');
var concat      = require('gulp-concat');
var path        = require('path');
var del         = require('del');

var dirFeature = '../../vendor/spryker/spryker/Bundles/**/src/SprykerFeature/Zed/**/Static/Assets';
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
    var search = dirFeature.match(/Bundles\/(.*)\/src/);
    var bundle = search[1];
    var target = dirPub + bundle + '/' + directory;

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
    //var a = gulp.src(['../../vendor/spryker/spryker/Bundles/**/src/SprykerFeature/Zed/**/Static/Assets']);

    //console.log(a);

    var a = _buildSource('fonts');

    console.log(a);

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

gulp.task('copy-js', function(){
    return copy('scripts');
});

gulp.task('dist', [
    'compile-less'
]);

gulp.task('default', [
    //'compile-less'
    'compile-js'
    //'copy-fonts'
    //,'copy-font-awesome'
    //,'copy-img'
    ,'copy-sprites'
    //,'copy-css'
    //,'copy-js'
]);
