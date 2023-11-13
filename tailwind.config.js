/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors');

module.exports = {
  mode: 'jit',
  content: [
    "./widgets/*.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

