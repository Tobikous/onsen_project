/** @type {import('tailwindcss').Config} */
module.exports = {
  // content: [],
  // theme: {
  //   extend: {},
  // },
  // plugins: [],

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", 
    "./node_modules/flowbite/**/*.js"
  ],


  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [require('@tailwindcss/line-clamp')],
  // plugins: [require('flowbite/plugin')],
}
