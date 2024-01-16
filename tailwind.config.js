/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'text': '#17150f',
        'background': '#FEFBF5',
        'primary': '#043B4F',
        'secondary': '#032B3A',
        'tertiary' : '#054962'
       },       
    },
  },
  plugins: [],
}

