const gulp = require('gulp');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const sass = require('gulp-dart-sass');
const sourcemaps = require('gulp-sourcemaps');

// Compile Sass and add vendor prefixes if needed
gulp.task('css', function () {
	var plugins = [
		autoprefixer()
	];
	return gulp.src('./sass/style.scss')
	    .pipe(sourcemaps.init())
	    .pipe(sass({
			outputStyle: 'expanded',
			precision: 10,
			indentType: 'tab',
			indentWidth: '1'
	    }).on('error', sass.logError))
		.pipe(postcss(plugins))
	    .pipe(sourcemaps.write('./sass'))
	    .pipe(gulp.dest('./'));
});

// Watch all scss files
gulp.task('watch', function () {
	gulp.watch( './**/*.scss', gulp.series('css') );
});

// Default task that runs when running 'npx gulp'
gulp.task( 'default', gulp.series('css', 'watch') );
