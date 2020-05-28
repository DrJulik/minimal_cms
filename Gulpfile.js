
const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass');
const minifyCSS = require('gulp-csso');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
var plumber = require('gulp-plumber');
const browserSync = require('browser-sync').create();

function css() {
    return src('./sass/*.scss', { sourcemaps: true })
        .pipe(plumber())
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(dest('./'), { sourcemaps: true })
        .pipe(browserSync.stream());
}

function js() {
    return src('./js/*.js', { sourcemaps: true })
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('build.min.js'))
        .pipe(dest('./js/min', { sourcemaps: true }));
}

function browser() {
    browserSync.init({
        proxy: 'http://minimal-cms.local/',
        files: [
            './**/*.php'
        ]
    });

    watch('./sass/**/*.scss', css);
    watch('./js/*.js', js).on('change', browserSync.reload);
}

exports.css = css;
exports.js = js;
exports.default = browser;