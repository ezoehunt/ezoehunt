var gulp = require('gulp');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var rename = require('gulp-rename');
var wrapper = require('gulp-wrapper');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

// Directories
var sourceSassDir = '_assets/scss/*.scss';
var sourceSass = '_assets/scss/application.scss';
var sourceJS = '_assets/js/application.js';
var targetCSS = 'css';
var targetJS = 'js';

// Combine and Minify JS
gulp.task('buildjs', function() {
  return gulp.src([
    '_assets/js/vendor/tether.js',
    '_assets/js/vendor/bootstrap.min.js',
    '_assets/js/vendor/ie10-viewport-bug-workaround.js',
    '_assets/js/vendor/waves.js',
    '_assets/js/application.js'
    ])
    .pipe(concat('application.min.js'))
    .pipe(uglify())
    .pipe(wrapper({ header:
      '/*!\n' +
      '* This file includes the following JS : \n' +
      '* -- Tether (http://tether.io/) \n' +
      '* -- IE10 viewport hack for Surface/desktop Windows 8 bug \n' +
      '* -- Bootstrap 4 (http://v4-alpha.getbootstrap.com/) \n' +
      '* -- Waves (http://fian.my.id/Waves/) \n' +
      '* -- Site specific JS \n */\n\n'
    }))
    .pipe(gulp.dest(targetJS))
    .pipe(notify({ message: 'JS compiled' }));
});

// Combine and Minify Sass
gulp.task('buildcss', function () {
  return sass(sourceSass, {
  style: 'compressed',
  })
  .pipe(wrapper({ header:
	'/*!\n' +
      '* This file includes the following CSS : \n' +
      '* -- Some basics from Bootstrap 4 (http://v4-alpha.getbootstrap.com/) \n' +
      '* -- Font Awesome (http://fontawesome.io/) \n' +
      '* -- Site specific CSS \n */\n\n'
  }))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(targetCSS))
  .pipe(notify({ message: 'CSS compiled' }));
});

// Run Sass task each time Sass files change
gulp.task('watch', function() {
      gulp.watch(sourceSass, ['buildcss']);
      gulp.watch(sourceJS, ['buildjs']);
});
