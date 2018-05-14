
const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const sourcemaps = require('gulp-sourcemaps');
const qcmq = require('gulp-group-css-media-queries');



const config = {
	src: './src',
	css: {
		src: '/precss/**/*.css',
		dest: '/css'
	},
	html: {
		src: '/index.html'
	}

};

gulp.task('font', function() {
  return gulp.src('font/**/*.ttf')
  .pipe(gulp.css('css'))
})


gulp.task('build', function(){
		gulp.src(config.src + config.css.src)
			.pipe(qcmq())
			.pipe(sourcemaps.init())
		    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
			}))
			.pipe(cleanCSS({
				level: 2
			}))
			.pipe(sourcemaps.write('.'))
			.pipe(gulp.dest(config.src + config.css.dest))
			.pipe(browserSync.reload({
				stream: true
			}));
});

gulp.task('watch', ['browserSync'], function(){
	gulp.watch(config.src + config.css.src, ['build']);
	gulp.watch(config.src + config.html.src, browserSync.reload);
});

gulp.task('browserSync', function() {
    browserSync.init({
        server: {
            baseDir: config.src
        }
    });
});