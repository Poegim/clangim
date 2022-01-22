const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: {
        content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/usernotnull/tall-toasts/config/**/*.php',
        './vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        ],
        safelist: [
            'from-red-400',
            'from-red-800',
            'from-blue-400',
            'from-indigo-400',
            'from-purple-400',
            'from-gray-400',
            'from-pink-400',
            'from-yellow-400',
            'from-green-400',
            'via-red-400',
            'via-yellow-400',
            'to-indigo-800',
            'to-yellow-400',
            'to-black',
            'left-8',
            'left-9',
        ]
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
