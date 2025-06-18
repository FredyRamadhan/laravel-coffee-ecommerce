import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Modern coffee-themed color palette
                primary: {
                    50: '#fef7ee',
                    100: '#fdedd3',
                    200: '#fad7a5',
                    300: '#f6ba6d',
                    400: '#f19533',
                    500: '#ed7611',
                    600: '#de5c07',
                    700: '#b84408',
                    800: '#93360e',
                    900: '#772d0f',
                },
                coffee: {
                    50: '#f7f3f0',
                    100: '#ede4db',
                    200: '#dcc9b8',
                    300: '#c6a68f',
                    400: '#b18968',
                    500: '#a0734f',
                    600: '#936043',
                    700: '#7a4d39',
                    800: '#654033',
                    900: '#53362c',
                },
                // Keep legacy colors for backward compatibility
                onyx: '#393E41',
                timber: '#D3D0CB',
                gold: '#E2C044',
                myrtle: '#587B7F',
                eerie: '#1E2019',
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'slide-up': 'slideUp 0.3s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(10px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
            },
        },
    },

    plugins: [forms],
};
