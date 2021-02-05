/*
 * Tutor_Starter uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel.com/docs/7.x/mix
 */

let mix = require('laravel-mix');

mix.webpackConfig({
	externals: {
		'react': 'React',
		'react-dom': 'ReactDOM'
	}
});

// Autloading jQuery to make it accessible to all the packages
// You can comment this line if you don't need jQuery
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix.setPublicPath('./assets/dist');

// Compile assets
mix.js('assets/src/scripts/app.js', 'assets/dist/js')
	.js('assets/src/scripts/customizer-preview.js', 'assets/dist/js')
	.react('inc/Api/Customizer/reactjs/src/customizer-controls.js', 'assets/dist/js')
	.react('inc/Custom/Schema/schemajs/src/tutor-schema.js', 'assets/dist/js')
	.react('inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js', 'assets/dist/js')
	.react('inc/Setup/Settings/reactjs/src/tutorstarter-dashboard.js', 'assets/dist/js')
	.sass('assets/src/sass/style.scss', 'assets/dist/css')
	.sass('assets/src/sass/admin.scss', 'assets/dist/css')
	.sass('inc/Api/Customizer/reactjs/src/sass/all-controls.scss', 'assets/dist/css')
	.sass('inc/Setup/Settings/reactjs/src/sass/dashboard.scss', 'assets/dist/css')

// Add versioning to assets in production environment
if (mix.inProduction()) {
	mix.version();
}
