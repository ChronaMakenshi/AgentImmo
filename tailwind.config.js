/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flow-bite/**/*.js"
  ],
  theme: {
    fontFamily: {
      'body': ['AbrilFatface-Regular'],
    },
    colors: {
      'bleu': '#032b94',
      'bleu-clair': '#6585ff',
      'rouge': '#af1414',
      'rouge-clair': '#fa1e1e',
      'noir': '#000000',
      'blanc': '#ffffff',
      'violer': '#7e5bef',
      'rose': '#ff49db',
      'orange': '#ff7849',
      'vert': '#13ce66',
      'vert-foncer': '#074b24',
      'jaune': '#ffc82c',
      'gris-foncer': '#273444',
      'gris': '#8492a6',
      'gris-clair': '#d3dce6',
    },
   },
}

