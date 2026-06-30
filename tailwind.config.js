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
            colors: {
                primary: {
                    DEFAULT: '#cc785c',
                    active: '#a9583e',
                    disabled: '#e6dfd8',
                },
                canvas: '#faf9f5',
                'surface-card': '#efe9de',
                'surface-soft': '#f5f0e8',
                'surface-dark': '#181715',
                'surface-dark-elevated': '#252320',
                ink: '#141413',
                body: '#3d3d3a',
                muted: '#6c6a64',
                'muted-soft': '#8e8b82',
                hairline: '#e6dfd8',
                'on-dark': '#faf9f5',
                'on-dark-soft': '#a09d96',
                success: '#5db872',
                warning: '#d4a017',
                error: '#c64545',
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Cormorant Garamond', 'EB Garamond', ...defaultTheme.fontFamily.serif],
                mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
            },
            maxWidth: {
                content: '1200px',
            },
            spacing: {
                section: '96px',
            },
            borderRadius: {
                card: '12px',
            },
        },
    },

    plugins: [forms],
};
