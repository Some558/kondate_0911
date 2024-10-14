import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['ZEN角ゴシック','Noto Sans JP', 'M PLUS 1p',  ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
