const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                'noto-sans': ['Noto Sans JP', 'sans-serif'],
            },
            backgroundImage: {
                'header-bg': "url('/images/layout/header_parts_pc.png')",
            },
            screens: {
                'l-pc': { max: '1440px' },
                's-pc': { max: '1100px' },
                'pc': { max: '960px' },
                'pc-sp': { max: '764px' },
                'sp': { max: '520px' },
            },
            fontSize: {
                '3sm': '10px',
                '2sm': '12px',
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        function({ addUtilities }) {
            const newUtilities = {
              ".text-shadow": {
                textShadow: "3px 3px 8px black"
              },
              ".text-shadow-md": {
                textShadow: "0px 3px 3px black"
              },
              ".text-shadow-lg": {
                textShadow: "0px 5px 3px black"
              },
              ".text-shadow-xl": {
                textShadow: "0px 7px 3px black"
              },
              ".text-shadow-2xl": {
                textShadow: "0px 10px 3px black"
              },
              ".text-shadow-none": {
                textShadow: "none"
              }
            };

            addUtilities(newUtilities);
          }
    ],
};
