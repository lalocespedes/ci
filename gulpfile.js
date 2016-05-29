var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');


gulp.task('styles', function() {
	//console.log('You ran');
	return gulp.src([
		'./bower_components/bootstrap/dist/css/bootstrap.css',
		'./frontend/css/general.css'
	])
	.pipe(concat('app.css'))
	.pipe(gulp.dest('./public/assets/style/css'));

});

gulp.task('scripts', function() {
	gulp.src([
		'./bower_components/bootstrap/dist/js/bootstrap.js'
	])
	.pipe(concat('main.js'))
	.pipe(uglify())
	.pipe(gulp.dest('./public/assets/jquery'));

	return gulp.src('./bower_components/jquery/dist/jquery.js')
	.pipe(gulp.dest('./public/assets/jquery'));

	return gulp.src('./bower_components/jquery-ui/jquery-ui.min.js')
	.pipe(gulp.dest('./public/assets/jquery'));
	
});

gulp.task('own_scripts', function() {
	gulp.src([
		'./frontend/js/script.js'

	])
	.pipe(concat('app2.js'))
	.pipe(uglify())
	.pipe(gulp.dest('./public/assets/jquery'));
	
});

gulp.task('watch', function() {
	gulp.watch('./assets/style/css/*.css', ['styles']);
	gulp.watch('./assets/jquery/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'own_scripts', 'scripts']);