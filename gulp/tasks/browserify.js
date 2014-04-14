var browserify = require('browserify');
var gulp = require('gulp');
var livereload = require('gulp-livereload');
var notify = require("gulp-notify");
var source = require('vinyl-source-stream');
var uglify = require('gulp-uglify');
var streamify = require('gulp-streamify');

module.exports = function() {
    return browserify({
            entries: ['./src/javascript/app.coffee'],
            extensions: ['.coffee', '.hbs']
        })
        .require('backbone/node_modules/underscore', { expose: 'underscore' })
        .bundle({debug: true})
        .on('error', notify.onError({
            message: "<%= error.message %>",
            title: "JavaScript Error"
        }))
        .pipe(source('app.js'))
        .pipe(streamify(uglify()))
        .pipe(gulp.dest('./public/build/'));
};
