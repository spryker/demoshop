var _gulp   = require('gulp');
var _rename = require('gulp-rename');
var _core   = require('../../vendor/spryker/ui/gulpfile');

var _path   = require('path');
var _del    = require('del');


var _dirFeature = 'vendor/spryker/*/src/SprykerFeature/Zed/*/Static/Public';
var _dirPub     = 'static/public/Zed/bundles';

var _match = /[^\/]+\/src\/SprykerFeature\/Zed\/([^\/]+)\/Static\/Public/;



function _buildSource(type) {
	var source = {
		'css'    : 'styles/**/*.css',
		'js'     : 'scripts/**/*.js',
		'images' : 'images/**/*.{svg,png,jpeg,gif}',
		'fonts'  : 'fonts/**/*.{svg,woff,otf,ttf,eot}'
	};

	return [
		_path.join(_dirFeature, source[type])
	];
}

function _changeDest(path) {
	path.dirname = path.dirname.replace(_match, function(match, p1) {
		return p1;
	});
}

function _copy(type) {
	return _gulp.src(_buildSource(type))
		.pipe(_rename(_changeDest))
		.pipe(_gulp.dest(_dirPub));
}



_gulp.task('clean-css', function(done) {
	_del(_dirPub + '/*/styles', done);
});

_gulp.task('clean-js', function(done) {
	_del(_dirPub + '/*/scripts', done);
});

_gulp.task('clean-images', function(done) {
	_del(_dirPub + '/*/images', done);
});

_gulp.task('clean-fonts', function(done) {
	_del(_dirPub + '/*/fonts', done);
});


_gulp.task('copy-pub', function() {
	return _gulp.src('static/assets/Zed/*', {
		dot : true
	})
		.pipe(_gulp.dest('static/public/Zed'));
});


_gulp.task('copy-css', ['clean-css'], function() {
	return _copy('css');
});

_gulp.task('copy-js', ['clean-js'], function() {
	return _copy('js');
});

_gulp.task('copy-images', ['clean-images'], function() {
	return _copy('images');
});

_gulp.task('copy-fonts', ['clean-fonts'], function() {
	return _copy('fonts');
});


_gulp.task('core-dev', function(done) {
	_core.createCoreResources('./vendor/spryker/ui', 'dev', done);
});

_gulp.task('core-dist', function(done) {
	_core.createCoreResources('./vendor/spryker/ui', 'dist', done);
});

_gulp.task('watcher', function() {
	_core.watchCoreResources('./vendor/spryker/ui', function(task) {
		var map = {
			'dev-css'    : 'copy-css',
			'dev-js'     : 'copy-js',
			'dev-images' : 'copy-images',
			'dev-fonts'  : 'copy-fonts'
		};

		if (task in map) _gulp.start(map[task]);
	});
});


_gulp.task('dev', [
	'clean-css',
	'clean-js',
	'clean-images',
	'clean-fonts',
	'copy-pub',
	'copy-css',
	'copy-js',
	'copy-images',
	'copy-fonts'
]);

_gulp.task('dist', [
	'clean-css',
	'clean-js',
	'clean-images',
	'clean-fonts',
	'copy-pub',
	'copy-css',
	'copy-js',
	'copy-images',
	'copy-fonts'
]);


_gulp.task('dev-all', ['core-dev'], function(done) {
	_gulp.start([
		'clean-css',
		'clean-js',
		'clean-images',
		'clean-fonts',
		'copy-pub',
		'copy-css',
		'copy-js',
		'copy-images',
		'copy-fonts'
	], done);
});

_gulp.task('dist-all', ['core-dist'], function(done) {
	_gulp.start([
		'clean-css',
		'clean-js',
		'clean-images',
		'clean-fonts',
		'copy-pub',
		'copy-css',
		'copy-js',
		'copy-images',
		'copy-fonts'
	], done);
});


_gulp.task('default', [
	'dist'
]);