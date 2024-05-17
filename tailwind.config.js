/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./project/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        'reddit-sans': ['"Reddit Sans"', 'sans-serif'], 
      },

      colors: {
        'fundo': '#2d2d2d',
      },

      boxShadow: {
        'custom-shadow': '3px 0 0 rgb(22 163 74)',
      },
    },
  },
  plugins: [
    function ({ addUtilities }) {
      const newUtilities = {
        '.padding-custom': {
          padding: '40px 0 40px 1%',
        },
      }
      addUtilities(newUtilities, ['responsive', 'hover'])
    },
  ],
}

