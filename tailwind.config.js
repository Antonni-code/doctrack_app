import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import withMT from "@material-tailwind/html/utils/withMT";

/** @type {import('tailwindcss').Config} */
export default withMT({
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        'node_modules/preline/dist/*.js',
    ],
    darkMode: 'class', // Enable class-based dark mode
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                emerald: {
                 50: "#ECFDF5", // rgb(236, 253, 245)
                100: "#D1FAE5", // rgb(209, 250, 229)
                200: "#A7F3D0", // rgb(167, 243, 208)
                300: "#6EE7B7", // rgb(110, 231, 183)
                400: "#34D399", // rgb(52, 211, 153)
                500: "#10B981", // rgb(16, 185, 129)
                600: "#059669", // rgb(5, 150, 105)
                700: "#047857", // rgb(4, 120, 87)
                800: "#065F46", // rgb(6, 95, 70)
                900: "#064E3B", // rgb(6, 78, 59)
                950: "#022C22", // rgb(2, 44, 34)
                },

                tigergray: {
                    50: "#F4F6FB"
                },

                doraemon:{
                    100: "#0032A2"
                }
            },
            maxWidth: {
                'custom': '40rem', // 640px
            },
        },
    },

    plugins: [
        forms,
        typography,
        require('flowbite/plugin'),
        require('preline/plugin'),
        ],
});
