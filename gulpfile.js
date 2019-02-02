const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

var paths = [
  'css/main.scss'
];

gulp.task('sass', function(){
  return gulp.src('./css/main.scss')
  .pipe(sass({ outputStyle: 'compressed' }).on("error",sass.logError))
  .pipe(gulp.dest('./css'))
});

gulp.task('watch', function(){
  gulp.watch(paths, gulp.series('sass'));
});

gulp.task('default',gulp.series("sass"));
