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

//gulp.task('clean-css', function(done){
//    del(dirPub + '/Gui/styles/*', function(err, paths){
//        console.log('Deleted: ', path.join('\n'));
//    },{ force: true });
//});

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
]);

gulp.task('do-nothing');

gulp.task('default', [
    'do-nothing'
    //,'clean-files'
    ,'copy-files'
    ,'compile-less'
    ,'compile-js'
]);
