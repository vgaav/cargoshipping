/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./src/**/*.{html,js,vue}", // Scans all files in src folder for Tailwind classes
      "./resources/js/pages/**/*.vue" // Include all Vue files in the pages directory and subdirectories
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
s
