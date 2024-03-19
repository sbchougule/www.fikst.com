// Defining requirements
var gulp = require( 'gulp' );
var plumber = require( 'gulp-plumber' );
var sass = require( 'gulp-sass' );
var cssnano = require( 'gulp-cssnano' );
var rename = require( 'gulp-rename' );
var concat = require( 'gulp-concat' );
var uglify = require( 'gulp-uglify' );
var ignore = require( 'gulp-ignore' );
var rimraf = require( 'gulp-rimraf' );
var sourcemaps = require( 'gulp-sourcemaps' );
var del = require( 'del' );
var cleanCSS = require( 'gulp-clean-css' );
var autoprefixer = require( 'gulp-autoprefixer' );


// Configuration file to keep your code DRY
var cfg = require( './gulpconfig.json' );
var paths = cfg.paths;

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task( 'sass', function() {
    var stream = gulp.src( `${paths.css}/*.scss` )
        .pipe( sourcemaps.init( { loadMaps: true } ) )
        .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err );
                this.emit( 'end' );
            }
        } ) )
        .pipe( sass( { errLogToConsole: true } ) )
        .pipe( autoprefixer( 'last 5 versions' ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( paths.css ) )
    return stream;
});

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task( 'watch', function() {
    gulp.watch( `${paths.css}/**/*.scss`, gulp.series('styles') );
    gulp.watch( [`${paths.js}/**/*.js`, '**/*.js', '!js/production.js', '!js/production.min.js'], gulp.series('scripts') );
});

// Run:
// gulp cssnano
// Minifies CSS files
gulp.task( 'cssnano', function() {
  return gulp.src( `${paths.css}/theme.css` )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err );
                this.emit( 'end' );
            }
        } ) )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( cssnano( { discardComments: { removeAll: true } } ) )
    .pipe( sourcemaps.write( './' ) )
    .pipe( gulp.dest( paths.css ) );
});


gulp.task( 'minifycss', function() {
  return gulp.src( paths.css + '/theme.css' )
  .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( cleanCSS( { compatibility: '*' } ) )
    .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err ) ;
                this.emit( 'end' );
            }
        } ) )
    .pipe( rename( { suffix: '.min' } ) )
     .pipe( sourcemaps.write( './' ) )
    .pipe( gulp.dest( paths.css ) );
});


gulp.task( 'cleancss', function() {
  return gulp.src( `${paths.css}/*.min.css`, { read: false } ) // Much faster
    .pipe( ignore( 'theme.css' ) )
    .pipe( rimraf() );
});

gulp.task( 'styles', gulp.series( 'sass', 'minifycss' ));

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task( 'scripts', function() {
    var scripts = [

        // Start - All BS4 stuff
        `${paths.js}/bootstrap4/bootstrap.bundle.js`,

        // End - All BS4 stuff

        `${paths.js}/skip-link-focus-fix.js`,

        `${paths.js}/plugins.js`,

        // Adding currently empty javascript file to add on for your own themes´ customizations
        // Please add any customizations to this .js file only!
        `${paths.js}/main.js`,
    ];
  return gulp.src( scripts, { allowEmpty: true } )
    .pipe( concat( 'production.min.js' ) )
    .pipe( uglify() )
    .pipe( gulp.dest( paths.js ) );

});

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser 'browser-sync',
gulp.task( 'default', gulp.parallel( 'watch', 'scripts'));

// Run:
// gulp copy-assets.
// Copy all needed dependency assets files from bower_component assets to themes /js, /scss and /fonts folder. Run this task after bower install or bower update

////////////////// All Bootstrap SASS  Assets /////////////////////////

// Deleting the files distributed by the copy-assets task
gulp.task( 'clean-vendor-assets', function() {
  return del( [`${paths.js}/bootstrap4/*.js`, `${paths.css}/sass/bootstrap4/*.js`, `${paths.css}/sass/bootstrap4/**/*.js`, './fonts/*wesome*.{ttf,woff,woff2,eot,svg}', `${paths.css}/sass/fontawesome/*.scss`, `${paths.js}/vendor/popper.min.js`, `${paths.js}/vendor/popper.js`] );
});

gulp.task( 'copy-assets', () => {

////////////////// All Bootstrap 4 Assets /////////////////////////
// Copy all JS files
    var stream = gulp.src( `${paths.node}bootstrap/dist/js/*.js` )
        .pipe( gulp.dest( `${paths.js}/bootstrap4` ) );

        // Copy all Bootstrap SCSS files
            gulp.src( `${paths.node}bootstrap/scss/**/*.scss` )
                .pipe( gulp.dest( `${paths.css}/sass/bootstrap4` ) );

        ////////////////// End Bootstrap 4 Assets /////////////////////////

        // Copy all Font Awesome Fonts
            gulp.src( `${paths.node}font-awesome/fonts/*.{ttf,woff,woff2,eot,svg}` )
                .pipe( gulp.dest( './fonts' ) );

        // Copy all Font Awesome SCSS files
            gulp.src( `${paths.node}font-awesome/scss/*.scss` )
                .pipe( gulp.dest( `${paths.css}/sass/fontawesome` ) );


        // Copy Popper JS files
            gulp.src( `${paths.node}popper.js/dist/umd/popper.min.js` )
                .pipe( gulp.dest( `${paths.js}${paths.vendor}` ) );
            gulp.src( `${paths.node}popper.js/dist/umd/popper.js` )
                .pipe( gulp.dest( `${paths.js}${paths.vendor}` ) );


    return stream;
});