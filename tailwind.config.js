import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      animation: {
        gradient: 'gradient 5s linear infinite',
        'gradient-hover': 'gradient-hover 5s linear infinite',
      },
      keyframes: {
        gradient: {
          '0%': { 'background-image': 'linear-gradient(to right, #ff0000, #00ff00)' },
          '50%': { 'background-image': 'linear-gradient(to right, #00ff00, #0000ff)' },
          '100%': { 'background-image': 'linear-gradient(to right, #0000ff, #ff0000)' },
        },
        'gradient-hover': {
          '0%': { 'background-image': 'linear-gradient(to right, #ff00ff, #ffff00)' },
          '50%': { 'background-image': 'linear-gradient(to right, #ffff00, #00ffff)' },
          '100%': { 'background-image': 'linear-gradient(to right, #00ffff, #ff00ff)' },
        },
      },
    },
  },

  plugins: [forms],
};
