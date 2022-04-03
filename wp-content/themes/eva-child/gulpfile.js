const { series, src, dest, watch } = require('gulp');
var sass = require("gulp-sass")(require('sass'));
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var plumber = require('gulp-plumber');
var minicss  = require("gulp-minify-css");
var rename = require("gulp-rename");

var cfg = {
	stylesPathCustom: 'devel/styles-custom',
	scriptsPathCustom: 'devel/scripts-custom'
};

function cud_compile_styles () {

	return src(cfg.stylesPathCustom + '/main.scss')
		.pipe(sourcemaps.init())
		.pipe(sass.sync({ outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(sourcemaps.write())
		.pipe(rename({
			suffix: '.min'
		}))
	  	.pipe(minicss())
		.pipe(dest('css'));
}

// minify - final step js
function cud_uglify_scripts_custom() {
	return src(['js/custom.min.js'])
		.pipe(plumber({
			errorHandler: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(uglify())
		.pipe(dest('js'));
}

// concatenate - 1st step js
function concat_scripts_custom() {
	return src([cfg.scriptsPathCustom + '/libs/*.js', cfg.scriptsPathCustom + '/*.js'])
		.pipe(concat('custom.js'))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(dest('js'));
}

exports.default = function() {

	watch(cfg.stylesPathCustom  + '/**/*.scss', series( cud_compile_styles ) );

};


exports.uglify_concat = function() {

	watch(cfg.scriptsPathCustom + '/**/*.js', series(concat_scripts_custom) );

};
