// Reference: https://markgoodyear.com/2014/01/getting-started-with-gulp/
// Reference: https://scotch.io/tutorials/how-to-use-browsersync-for-faster-development

// Load plugins
var gulp = require("gulp"),
  sass = require("gulp-sass"),
  autoprefixer = require("gulp-autoprefixer"),
  cssnano = require("gulp-cssnano"),
  jshint = require("gulp-jshint"),
  uglify = require("gulp-uglify"),
  imagemin = require("gulp-imagemin"),
  rename = require("gulp-rename"),
  concat = require("gulp-concat"),
  cache = require("gulp-cache"),
  del = require("del");
browsersync = require("browser-sync").create();
sass.compiler = require("node-sass");

// Browsersync
gulp.task("browser-sync", function () {
  browsersync.init({
    proxy: "ecoman.test",
  });
});

// Styles
/*gulp.task("sass", function () {
  return sass("src/sass/style.scss", { style: "compressed" })
    .pipe(autoprefixer("last 2 version"))
    .pipe(gulp.dest("dist/css"))
    .pipe(cssnano())
    .pipe(browsersync.reload({ stream: true }));
});*/

gulp.task("sass", function () {
  return gulp
    .src("src/sass/style.scss")
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(cssnano())
    .pipe(gulp.dest("dist/css"))
    .pipe(browsersync.reload({ stream: true }));
});

// Scripts
var scriptList = [
  "src/js/classie.js",
  "src/js/modernizr.js",
  "src/js/wow.min.js",
  "src/js/jQueryTab.js",
  "src/js/equal-height.js",
  "src/js/isotope.pkgd.min.js",
  "src/js/isotope_feeds.js",
  "src/js/packery-mode.pkgd.min.js",
  "src/js/parallax.js",
  "src/js/index.js",
];

gulp.task("js", function () {
  return (
    gulp
      .src(scriptList)
      .pipe(jshint(".jshintrc"))
      .pipe(jshint.reporter("default"))
      .pipe(concat("app.js"))
      //.pipe(gulp.dest('dist/js'))
      .pipe(rename({ suffix: ".min" }))
      .pipe(uglify())
      .pipe(gulp.dest("dist/js"))
      .pipe(browsersync.reload({ stream: true }))
  );
});

/** Images
 * This will take any source images and run them through the imagemin plugin. We can go a
 * little further and utilise caching to save re-compressing already compressed images each time this task runs
 */
gulp.task("images", function () {
  return gulp
    .src(["src/images/*", "src/images/**/*"])
    .pipe(
      cache(
        imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })
      )
    )
    .pipe(gulp.dest("dist/images"));
});

/** Clean
 * Before deploying, it’s a good idea to clean out the destination folders and rebuild the files—just in case
 * any have been removed from the source and are left hanging out in the destination folder:
 */
gulp.task("clean", function () {
  return del(["dist/js", "dist/images"]);
});

/** Default task
 * We can create a default task, run by using $ gulp, to run all three tasks we have created:
 */
gulp.task(
  "default",
  gulp.series("clean", function () {
    gulp.series("sass", "js", "images");
  })
);

// Create watch task
gulp.task(
  "watch",
  gulp.series("browser-sync", function () {
    gulp.watch("src/sass/**/*.scss", ["sass"]);
    gulp.watch("src/images/*", ["images"]);
    gulp.watch("src/js/**/*.js", ["js"]);
    gulp.watch("*.php").on("change", browsersync.reload);
  })
);
