/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#ef3b2d",
            },
        },
    },
    plugins: [
        "./node_modules/prettier-plugin-blade/",
        "./node_modules/prettier-plugin-tailwindcss/",
    ],
    overrides: [
        {
            files: ["*.blade.php"],
            options: {
                parser: "blade",
            },
        },
    ],
};
