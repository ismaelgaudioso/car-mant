const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'dodger-blue': {
                '50': '#f5f9ff',
                '100': '#ebf3ff',
                '200': '#cce2ff',
                '300': '#aed0ff',
                '400': '#71adff',
                '500': '#348aff',
                '600': '#2f7ce6',
                '700': '#2768bf',
                '800': '#1f5399',
                '900': '#19447d'
            },
            'sea-buckthorn': {
                '50': '#fffbf5',
                '100': '#fff6ea',
                '200': '#ffeacb',
                '300': '#ffddac',
                '400': '#ffc36d',
                '500': '#ffa92f',
                '600': '#e6982a',
                '700': '#bf7f23',
                '800': '#99651c',
                '900': '#7d5317'
            }
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
