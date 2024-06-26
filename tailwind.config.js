// tailwind.config.js
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
      extend: {
        height: {
            '96': '24rem', // 384px
            '128': '32rem', // 512px
            '144': '36rem', // 576px
            '160': '40rem', // 640px
          },
      },
    },
    plugins: [],
  };
