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
	var changed     = require('gulp-changed');
	var notify      = require('gulp-notify');
	var autoprefix  = require('gulp-autoprefixer');
	var connect     = require('gulp-connect-php');
	var imagemin    = require('gulp-imagemin');
	var rename      = require('gulp-rename');
	var browserSync = require('browser-sync');
    var critical = require('critical');
	var reload      = browserSync.reload;


/************************************************
	PATH VARIABLES
************************************************/
	var phpSrc       = './build/**/*.php';

	var stylesSrc    = './src/scss/**/*.scss';
	var stylesDest   = './build/css';

	var scriptsSrc   = './src/js/index';
	var scriptsDest  = './build/js';
	var scriptsWatch = './src/js/**/*.js';

	var imgSrc       = './build/img/**/*';
	var imgDest      = './build/img';


/************************************************
	Error handler
************************************************/
	function handleError(err) {
	    console.log(err.toString());
	    this.emit('end');
	}

/************************************************
	PHP SERVER
************************************************/
	gulp.task('phpServer', function() {
		connect.server({
			bin: 'C:/MAMP/bin/php/php5.6.3/php.exe',
			ini: 'C:/MAMP/conf/php5.6.3/php.ini',
			base: './build'
		}, function (){
			browserSync({
				proxy: 'localhost:8000'
			});

            gulp.watch(stylesSrc, ['styles']);
		});
	});

/************************************************
	SCSS(libsass) & CSS
************************************************/
    gulp.task('styles', function() {
        gulp.src(stylesSrc)
            .pipe(sass({
                includePaths: [
                    'C:/Ruby193/lib/ruby/gems/1.9.1/gems/susy-2.2.2/sass' //required for sass
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

/************************************************
	IMG
************************************************/
	gulp.task('images', function () {
		return gulp.src(imgSrc)
                .pipe(changed(imgDest))
                .pipe(imagemin({
                    optimizationLevel: 3,
                    progressive: true,
                    interlaced: true
                }))
				.pipe(gulp.dest(imgDest))
				.pipe(notify('Images compressed!'));
	});

/************************************************
	WATCH
************************************************/
	gulp.task('watch', function() {
		gulp.watch(phpSrc,       ['phpServer', reload]);
		gulp.watch(scriptsWatch, ['scripts',   reload]);
		gulp.watch(imgSrc,       ['images',    reload]);
	});

/************************************************
	DEFAULT
************************************************/
	gulp.task('default', ['phpServer', 'styles', 'scripts', 'watch']);


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