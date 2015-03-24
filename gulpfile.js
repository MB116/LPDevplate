/************************************************
	INCLUDE PLUGINS
************************************************/
	var gulp        = require('gulp');
	//var compass     = require('gulp-compass');
    var sass        = require('gulp-sass');
    var sourcemaps  = require('gulp-sourcemaps');
	var uglify      = require('gulp-uglify');
	var concat      = require('gulp-concat');
	var browserify  = require('browserify');
	var source      = require('vinyl-source-stream');
	var streamify   = require('gulp-streamify');
	var minifycss   = require('gulp-cssmin');
	var notify      = require('gulp-notify');
	var autoprefix  = require('gulp-autoprefixer');
	var connect     = require('gulp-connect-php');
	var imagemin    = require('gulp-imagemin');
	var rename      = require("gulp-rename");
	var browserSync = require('browser-sync');


/************************************************
	PATH VARIABLES
************************************************/
	var phpSrc       = './build/**/*.php';

	var stylesSrc    = './src/scss/**/*.scss';
	var stylesDest   = './build/css';

	var scriptsSrc   = './src/js/index';
	var scriptsDest  = './build/js';
	var scriptsWatch = './src/js/**/*.js';

	var imgSrc       = './src/img/**/*';
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
		});
	});

/************************************************
	SCSS & CSS
************************************************/
	gulp.task('styles', function() {
		return gulp.src(stylesSrc)
				//.pipe(compass({
				//	config_file: './config.rb',
				//	css: stylesDest,
				//	sass: 'src/scss/',
				//	debug : true,
				//	sourcemap: true,
				//	comments: false
				//}))
                // Initializes sourcemaps
                .pipe(sourcemaps.init())
                .pipe(sass({
                    includePaths: [
                        'C:/Ruby193/lib/ruby/gems/1.9.1/gems/susy-2.2.2/sass/susy/language'
                    ],
                    errLogToConsole: true
                }))
                // Writes sourcemaps into the CSS file
                .pipe(sourcemaps.write())
				.pipe(autoprefix("last 15 version"))
				.pipe(minifycss())
				.pipe(concat('styles.min.css'))
				.pipe(gulp.dest(stylesDest))
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
		gulp.watch(phpSrc,       ['phpServer', browserSync.reload]);
		gulp.watch(stylesSrc,    ['styles',    browserSync.reload]);
		gulp.watch(scriptsWatch, ['scripts',   browserSync.reload]);
		gulp.watch(imgSrc,       ['images',    browserSync.reload]);
	});

/************************************************
	DEFAULT
************************************************/
	gulp.task('default', ['phpServer', 'styles', 'scripts', 'watch']);