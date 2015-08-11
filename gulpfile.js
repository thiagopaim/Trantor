var gulp						= require('gulp'),
		concat					= require('gulp-concat'),
		minifyCSS				= require('gulp-minify-css'),
		uglifyJS				= require('gulp-uglify'),
		autoprefixer		= require('gulp-autoprefixer'),
		rename					= require('gulp-rename'),
		watch						= require('gulp-watch'),
		browserSync			= require('browser-sync');

// minifica e concatena folha de estilos
gulp.task('styles', function(){
	gulp.src('./assets/css/*.css')
		.pipe(minifyCSS({
 			keepBreaks: false
 		}))
 		.pipe(concat('style.css'))
 		.pipe(gulp.dest('dist/css'))
});

// minifica e concatena javascript
gulp.task('js', function(){
	gulp.src('./assets/js/*.js')
		.pipe(uglifyJS())
 		.pipe(concat('scripts.js'))
 		.pipe(gulp.dest('dist/js'))
});

// verifica arquivos
gulp.task('watch', function() {
    gulp.watch('./assets/css/*.css', ['styles']);
    gulp.watch('./assets/js/*.js', ['js']);
});

// browser releaod
gulp.task('browser-sync', function() {
	browserSync({
		proxy: "[COLOCAR O IP E A PASTA DO WORDPRESS AQUI]"
	});
});

gulp.task('default', ['browser-sync'], function(){
	gulp.watch('./assets/css/*.css', ['styles', browserSync.reload]);
	gulp.watch('./assets/js/*.js', ['js', browserSync.reload]);
});
