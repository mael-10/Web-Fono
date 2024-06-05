/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',  // ou 'media'
  content: ["./project/**/*.{js,jsx,ts,tsx,html}"],
  theme: {
    extend: {
      fontFamily: {
        'reddit-sans': ['"Reddit Sans"', 'sans-serif'],
      },
      colors: {
        'fundo': '#2d2d2d',
        'greenF': '#0c5f55',
        'buttonGreen': '#118E7F',
        'buttonHover': '#0c5f55', 
      },
      boxShadow: {
        'custom-shadow': '3px 0 0 rgb(22 163 74)',
      },
      height: {
        '93': '93vh',
      },
    },
  },
  plugins: [
    function ({ addUtilities }) {
      const newUtilities = {
        '.padding-custom': {
          padding: '40px 0 40px 1%',
        },
      };
      addUtilities(newUtilities, ['responsive', 'hover']);
    },
  ],
}
