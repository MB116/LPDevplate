/************************************************
 INCLUDE PLUGINS
 ************************************************/
var gulp        = require('gulp');
var sass        = require('gulp-sass');
var uglify      = require('gulp-uglify');
var concat      = require('gulp-concat');
var browserify  = require('browserify');
var source      = require('vinyl-source-stream');
var streamify   = require('gulp-streamify');
var minifycss   = require('gulp-cssmin');
var notify      = require('gulp-notify');
var autoprefix  = require('gulp-autoprefixer');
var connect     = require('gulp-connect-php');
var rename      = require('gulp-rename');
var browserSync = require('browser-sync');
var critical    = require('critical');
var reload      = browserSync.reload;


/************************************************
 PATH VARIABLES
 ************************************************/
var phpSrc       = './build/**/*.php';
var phpIni       = 'C:/MAMP/bin/php/php5.6.8/php.exe';
var phpExe       = 'C:/MAMP/conf/php5.6.8/php.ini';

var stylesSrc    = './src/scss/**/*.scss';
var stylesDest   = './build/css';

var scriptsSrc   = './src/js/index';
var scriptsDest  = './build/js';
var scriptsWatch = './src/js/**/*.js';

var susy = 'C:/Ruby22-x64/lib/ruby/gems/2.2.0/gems/susy-2.2.7/sass';

/************************************************
 SCSS(libsass) & CSS
 ************************************************/
gulp.task('styles', function() {
    gulp.src(stylesSrc)
        .pipe(sass({
            includePaths: [
                susy //required for sass
            ],
            errLogToConsole: true,
            sourceComments: 'map',
            sourceMap: 'scss'
        }))
        .pipe(autoprefix("last 15 version"))
        .pipe(minifycss())
        .pipe(concat('styles.min.css'))
        .pipe(gulp.dest(stylesDest))
        .pipe(reload({stream: true}))
        .pipe(notify('Styles compiled!'));
});

/************************************************
 JS
 ************************************************/
gulp.task('scripts', function() {
    return browserify(scriptsSrc, { debug: true })
        .bundle().on('error', handleError)
        .pipe(source('bundle.js'))
        .pipe(streamify(uglify()))
        .pipe(rename('scripts.min.js'))
        .pipe(gulp.dest(scriptsDest))
        .pipe(notify('Scripts compiled!'));
});
// create a task that ensures the `js` task is complete before
// reloading browsers
gulp.task('js-watch', ['scripts'], browserSync.reload);


/************************************************
 PHP SERVER
 ************************************************/
gulp.task('server', function() {
    connect.server({
        bin: phpIni,
        ini: phpExe,
        base: './build'
    }, function (){
        browserSync({
            proxy: 'localhost:8000'
        });

        //Watch
        gulp.watch(stylesSrc, ['styles']);
        gulp.watch(phpSrc).on('change', reload);
        gulp.watch(scriptsWatch, ['js-watch']);
    });
});

/************************************************
 Error handler
 ************************************************/
function handleError(err) {
    console.log(err.toString());
    this.emit('end');
}

/************************************************
 DEFAULT
 ************************************************/
gulp.task('default', ['server', 'styles', 'scripts']);


/************************************************
 Critical CSS
 ************************************************/
gulp.task('copystyles', function () {
    return gulp.src(['build/css/styles.min.css'])
        .pipe(rename({
            basename: "site" // site.css
        }))
        .pipe(gulp.dest('build/css/'));
});

gulp.task('critical', ['copystyles'], function () {
    critical.generateInline({
        base: 'build/',
        src: 'index.php',
        styleTarget: 'css/styles.min.css',
        htmlTarget: 'index.php',
        width: 960,
        height: 780,
        minify: true
    });
});