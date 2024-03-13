import plugin from 'tailwindcss/plugin'
import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'

const bearUI = plugin(function () {}, {
  content: ['./resources/**/*{.php,.blade.php}'],
  theme: {
    extend: {
      colors: {
        primary: colors.cyan,
        secondary: colors.slate,
        success: colors.green,
        warning: colors.amber,
        error: colors.red,
      },
      opacity: {
        2.5: 0.025,
        7.5: 0.075,
        15: 0.15,
      },
      boxShadow: {
        'l': '-1px 0px 3px 0 rgb(0 0 0 / 0.1), -1px 0px 2px -1px rgb(0 0 0 / 0.1)',
        'r': '1px 0px 3px 0 rgb(0 0 0 / 0.1), 1px 0px 2px -1px rgb(0 0 0 / 0.1)',
        't': '0px -1px 3px 0 rgb(0 0 0 / 0.1), 0px -1px 2px -1px rgb(0 0 0 / 0.1)',
        'l-md': '-4px 0px 6px -1px rgba(0 0 0 0.2), -2px 0px 4px -2px rgba(0 0 0 0.1)',
        'r-md': '4px 0px 6px -1px rgba(0 0 0 0.2), 2px 0px 4px -2px rgba(0 0 0 0.1)',
        't-md': '0px -4px 6px -1px rgba(0 0 0 0.2), 0px -2px 4px -2px rgba(0 0 0 0.1)',
      },
    },
  },
  plugins: [forms],
})

export default bearUI
