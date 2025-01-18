/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: false,
    content: ["./src/views/*.{html,js,php}", "./src/views/**/*.{html,js,php}"],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["light"],
    },
}
