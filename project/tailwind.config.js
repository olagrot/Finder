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
            height: {
              '120': '120px',
              '400': '400px'
            },
            width: {
                '120': '120px',
            },
            maxHeight: {
                '300': '300px'
            },
            maxWidth: {
                '300': '300px',
            },
            fontSize: {
                's60': '60px',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
