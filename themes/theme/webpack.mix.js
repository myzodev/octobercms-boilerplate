const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

/**
 * Theme
 */
mix.setPublicPath('assets')
	.js('src/js/app.js', 'js')
	.sass('src/sass/app.scss', 'assets/css/app.css')
	.options({
		postCss: [tailwindcss('./tailwind.config.js')],
	})

mix.copy('src/images', 'assets/images').copy('src/fonts', 'assets/fonts')

mix.options({
	processCssUrls: false,
	terser: { extractComments: false },
})

/**
 * Pugins
 */
mix.js('src/js/plugins/cookie-bar.js', '/plugins/webpage/gdpr/js')

if (!mix.inProduction()) {
	mix.sourceMaps().webpackConfig({ devtool: 'source-map' })
}

if (mix.inProduction()) {
	mix.version()
}
