import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
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
            container: {
                padding: "1rem", // Menambahkan padding 2 (0.5rem) pada container
            },
        },
    },

    plugins: [forms],
};
