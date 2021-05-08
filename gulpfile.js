const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();

//compile scss into css
function style(cb) {
    gulp.src('assets/css/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream());
    cb();
}

function watch() {
    gulp.watch('assets/css/*.scss', style)
}

exports.watch = watch;