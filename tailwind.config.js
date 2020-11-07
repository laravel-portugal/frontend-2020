const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'group-hover', 'focus', 'disabled'],
        backgroundColor: ['responsive', 'hover', 'focus', 'disabled'],
        cursor: ['hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
