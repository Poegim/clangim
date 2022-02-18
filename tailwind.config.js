const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
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
            'text-gray-50',
            'dark:text-gray-800',
            'text-gray-800',
            'text-black',
            'dark:text-gray-300',
            'text-gray-300',
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

            'bg-black',
            'bg-white',
            'bg-gray-600',
            'bg-gray-700',
            'bg-gray-800',
            'bg-gray-900',

            'bg-indigo-6',
            'bg-indigo-7',
            'bg-indigo-8',
            'bg-indigo-9',

            'bg-blue-600',
            'bg-blue-700',
            'bg-blue-800',
            'bg-blue-900',

            'bg-purple-6',
            'bg-purple-7',
            'bg-purple-8',
            'bg-purple-9',

            'bg-red-600"',
            'bg-yellow-6',
            'bg-yellow-7',
            'bg-yellow-8',
            'bg-yellow-9',

            'bg-pink-600',
            'bg-pink-700',
            'bg-pink-800',
            'bg-pink-900',

            //

            'dark:bg-black',
            'dark:bg-white',
            'dark:bg-gray-600',
            'dark:bg-gray-700',
            'dark:bg-gray-800',
            'dark:bg-gray-900',

            'dark:bg-indigo-6',
            'dark:bg-indigo-7',
            'dark:bg-indigo-8',
            'dark:bg-indigo-9',

            'dark:bg-blue-600',
            'dark:bg-blue-700',
            'dark:bg-blue-800',
            'dark:bg-blue-900',

            'dark:bg-purple-6',
            'dark:bg-purple-7',
            'dark:bg-purple-8',
            'dark:bg-purple-9',

            'dark:bg-red-600"',
            'dark:bg-yellow-6',
            'dark:bg-yellow-7',
            'dark:bg-yellow-8',
            'dark:bg-yellow-9',

            'dark:bg-pink-600',
            'dark:bg-pink-700',
            'dark:bg-pink-800',
            'dark:bg-pink-900',

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
