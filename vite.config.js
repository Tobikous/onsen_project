import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    laravel([
    //   'resources/sass/app.scss',
      'resources/js/app.js',
      'resources/css/app.css', 
    ]),
    vue(),
  ],
  server: {
    host: true,
    hmr: {
      host: 'localhost',
  },
  },
})