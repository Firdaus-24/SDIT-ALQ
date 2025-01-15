import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./public/**/*.html", // Jika ada file HTML di public
        "./node_modules/metronic/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "custom-blue": "#1B84FF",
                "custom-blue-hover": "#1669CC",
            },
            letterSpacing: {
                widest: ".25em",
            },
        },
    },

    plugins: [forms],
};
