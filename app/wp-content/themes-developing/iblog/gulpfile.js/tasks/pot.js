// ==== IMAGES ==== //

var gulp        = require('gulp'),
    wpPot       = require('gulp-wp-pot'),
    gulpsort    = require('gulp-sort'),
    config      = require('../../gulpconfig').theme;

// Generate pot file with new translations
gulp.task('potfilesgen', function () {
    return gulp.src(config.php.src)
        .pipe(gulpsort())
        .pipe(wpPot( {
            domain: 'iblog-theme',
            package: 'iblog-theme',
            lastTranslator: 'Altimea <apps@altimea.com>',
            team: 'Altimea <apps@altimea.com>'
        } ))
        .pipe(gulp.dest(config.lang.srcgen + '/iblog-theme.pot'));
});