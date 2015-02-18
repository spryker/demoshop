var _gulp   = require('gulp');
var _rename = require('gulp-rename');
//var _core = require('./vendor/spryker/zed-package/gulpfile');

var _path   = require('path');
var _del    = require('del');


var _dirCore = 'vendor/spryker/zed-package/src/ProjectA/Zed';
var _dirProj = 'src/Pyz/Zed';
var _dirPub  = 'static/public/Zed/bundles';

var _dirStatPub = '/Static/Public';



function _buildSource(type) {
	var source = {
		'css'    : 'styles/**/*.css',
		'js'     : 'scripts/**/*.js',
		'images' : 'images/**/*.{svg,png,jpeg,gif}',
		'fonts'  : 'fonts/**/*.{svg,woff,otf,ttf,eot}'
	};

	return [
		_path.join(_dirCore, '*', _dirStatPub, source[type]),
		_path.join(_dirProj, '*', _dirStatPub, source[type])
	];
}

function _changeDest(path) {
	path.dirname = path.dirname.replace(_dirStatPub, '');
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


_gulp.task('watcher', ['dev'], function() {
	_gulp.watch([
		_dirCore + '/*/Static/Public/*/styles/**/*.css',
		_dirProj + '/*/Static/Public/*/styles/**/*.css'
	], ['clean-css', 'copy-css']);

	_gulp.watch([
		_dirCore + '/*/Static/Public/*/scripts/**/*.js',
		_dirProj + '/*/Static/Public/*/scripts/**/*.js'
	],['clean-js', 'copy-js']);

	_gulp.watch([
		_dirCore + '/*/Static/Public/*/images/**/*.{svg,png,jpeg,gif}',
		_dirProj + '/*/Static/Public/*/images/**/*.{svg,png,jpeg,gif}'
	], ['clean-images', 'copy-images']);

	_gulp.watch([
		_dirCore + '/*/Static/Public/*/fonts/**/*.{svg,woff,otf,ttf,eot}',
		_dirProj + '/*/Static/Public/*/fonts/**/*.{svg,woff,otf,ttf,eot}'
	], ['clean-fonts', 'copy-fonts']);
});


_gulp.task('dev', [
	'clean-css',
	'clean-js',
	'clean-images',
	'clean-fonts',
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
	'copy-css',
	'copy-js',
	'copy-images',
	'copy-fonts'
]);


_gulp.task('default', [
	'dist'
]);