const gulp = require('gulp'),
    rename = require('gulp-rename'),
    //   minifyCSS = require('gulp-minify-css'),
    sass = require('gulp-sass'),
    // concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync').create(),
    uglify = require('gulp-uglify');

const styleSrc = './assets/src/sass/**/*.scss',
    styleDist = './assets/css',
    scriptSrc = './assets/src/scripts/**/*.js',
    scriptDist = './assets/js';

gulp.task('sass',()=>{
    //sconsole.log('Are you looking for something');
    return gulp.src(styleSrc)
        .pipe(sourcemaps.init())
        .pipe(sass({
            'outputStyle':'compressed'
        }).on('error',sass.logError))
        // .pipe(concat('main-style.css'))
        .pipe(rename({suffix:'.min'}))
        // .pipe( minifyCSS() )
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(styleDist))
        .pipe(browserSync.reload({
            stream:true
        }));
});

gulp.task('js',()=>{
    //sconsole.log('Are you looking for something');
    return gulp.src(scriptSrc)
        .pipe(sourcemaps.init())
        // .pipe(concat('activation.js'))
        .pipe(rename({suffix:'.min'}))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(scriptDist))
        .pipe(browserSync.reload({
            stream:true
        }));
});

gulp.task('server',()=>{
    browserSync.init({
        // server:'./',
        // open:false
        proxy:'http://localhost/lite'
    });
    gulp.watch(styleSrc, gulp.series('sass'));
    gulp.watch(scriptSrc, gulp.series('js'));
});

gulp.task('watch', gulp.parallel('server','sass','js'));