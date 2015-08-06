var gulp 		 = require('gulp'),
	concat 		 = require('gulp-concat'),
	minifyCSS 	 = require('gulp-minify-css'),
	autoprefixer = require('gulp-autoprefixer'),
	rename 		 = require('gulp-rename'),
	watch		 = require('gulp-watch'),
	browserSync  = require('browser-sync');

// minifica e concatena
gulp.task('styles', function(){
	gulp.src('./assets/css/*.css')
		.pipe(minifyCSS({
 			keepBreaks: false
 		}))
 		.pipe(concat('style.css'))
 		.pipe(gulp.dest('dist/css'))
});

// verifica arquivos
gulp.task('watch', function() {
    gulp.watch('./assets/css/*.css', ['styles']);
});

// browser releaod
gulp.task('browser-sync', function() {
	browserSync({
		proxy: "http://10.96.153.121/trantor/"
	});
});

gulp.task('default', ['browser-sync'], function(){
	gulp.watch('./assets/css/*.css', ['styles', browserSync.reload]);
});