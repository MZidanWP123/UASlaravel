/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        // "./resources/**/*.vue",
        // "./node_modules/flowbite/**/*.js"
    ],
    daisyui: {
        themes: ["light", "dark", "emerald"],
        darkTheme: false,
    },
    /*darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },*/

    /*fontFamily: {
        body: [
            "Inter",
            "ui-sans-serif",
            "system-ui",
            "-apple-system",
            "system-ui",
            "Segoe UI",
            "Roboto",
            "Helvetica Neue",
            "Arial",
            "Noto Sans",
            "sans-serif",
            "Apple Color Emoji",
            "Segoe UI Emoji",
            "Segoe UI Symbol",
            "Noto Color Emoji",
        ],
        sans: [
            "Inter",
            "ui-sans-serif",
            "system-ui",
            "-apple-system",
            "system-ui",
            "Segoe UI",
            "Roboto",
            "Helvetica Neue",
            "Arial",
            "Noto Sans",
            "sans-serif",
            "Apple Color Emoji",
            "Segoe UI Emoji",
            "Segoe UI Symbol",
            "Noto Color Emoji",
        ],
    },*/
    plugins: [
        /*require("flowbite/plugin"),*/ require("daisyui"),
        require("@tailwindcss/forms"),
    ],
};
