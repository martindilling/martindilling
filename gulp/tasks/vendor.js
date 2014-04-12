var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

module.exports = function() {
    var vendorFiles = [
        './src/javascript/vendor/jquery-1.11.0.min.js',
        './src/javascript/vendor/bootstrap.min.js',
        './src/javascript/vendor/jasny-bootstrap.min.js',
        './src/javascript/vendor/moment.min.js',
        './src/javascript/vendor/bootstrap-datetimepicker.min.js',
        './src/javascript/vendor/js-markdown-extra.js',
        './src/javascript/vendor/laravel-restful.js',
        './src/javascript/vendor/speakingurl.min.js',
        './src/javascript/vendor/prettify.js'
    ];
    var destPath = './public/build/';
    var destFile = 'vendor.js';

    return gulp.src(vendorFiles)
        .pipe(concat(destFile))
        .pipe(uglify())
        .pipe(gulp.dest(destPath));

};
