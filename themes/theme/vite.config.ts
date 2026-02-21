import { resolve } from "path";
import tailwindcss from "@tailwindcss/vite";
import { defineConfig } from "vite";

const input = {
	js: resolve(__dirname, "src/js/app.ts"),
	css: resolve(__dirname, "src/css/app.css"),
};

const themeName = "theme";

export default defineConfig({
	base: `/themes/${themeName}/assets/build/`,
	build: {
		rollupOptions: { input },
		manifest: true,
		emptyOutDir: true,
		outDir: resolve(__dirname, "assets/build"),
		assetsDir: "",
	},
	server: {
		hmr: {
			protocol: "ws",
		},
	},
	plugins: [tailwindcss()],
});
