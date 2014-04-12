var gulp = require('./gulp')([
    'browserify',
    'vendor',
    'compass',
    'images',
    'open',
    'watch',
    'serve'
]);

gulp.task('buildvendor', ['vendor']);
gulp.task('build', ['browserify', 'compass']);
gulp.task('default', ['vendor', 'build', 'watch']);
