import { defineConfig } from 'vite'
import { resolve } from 'path'

const input = {
    js: resolve(__dirname, 'src/js/app.js'),
    css: resolve(__dirname, 'src/sass/app.scss'),
}

const themeName = 'theme'

export default defineConfig({
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
    }
})
