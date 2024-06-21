mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
    // other PostCSS plugins as needed
  ]);
