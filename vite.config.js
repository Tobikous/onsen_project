import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue' // ⭐️ 追加

export default defineConfig({
  plugins: [
    laravel([
      'resources/sass/style.scss',
      'resources/js/app.js',
    ]),
    vue(), // ⭐️ 追加
  ],
  server: {
    host: true,
    hmr: {
      host: 'localhost',
  },
  },
})