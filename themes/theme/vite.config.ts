import { resolve } from 'path'
import type { UserConfig } from 'vite'

const input = {
	js: resolve(__dirname, 'src/js/app.ts'),
	css: resolve(__dirname, 'src/sass/app.scss'),
}

const themeName = 'theme'

export default {
	base: `/themes/${themeName}/assets/build/`,
	build: {
		rollupOptions: { input },
		manifest: true,
		emptyOutDir: true,
		outDir: resolve(__dirname, 'assets/build'),
	},
	server: {
		hmr: {
			protocol: 'ws',
		},
	},
} satisfies UserConfig
