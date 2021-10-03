const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                 'gold':  {
                    100: '#fffaf0',
                    200: '#feebc8',
                    300: '#fbd38d',
                    400: '#f6ad55',
                    500: '#ce984e',
                    600: '#b18447',
                    700: '#c05621',
                    800: '#9c4221',
                    900: '#7b341e',
                },

            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
