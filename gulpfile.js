const gulp = require('gulp');
const sass = require('gulp-sass');

//compile scss into css
function style(cb) {
    gulp.src('assets/css/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('assets/css'));
    cb();
}

function watch() {
    gulp.watch('assets/css/*.scss', style)
}

exports.watch = watch;