import plugin from 'tailwindcss/plugin'
import colors from 'tailwindcss/colors'

const bearUI = plugin(
  function () {},
  {
    theme: {
      extend: {
        colors: {
          primary: colors.cyan,
        },
        opacity: {
            "2.5": .025,
            "7.5": .075,
            "15": .15,
        },
      },
    }
  }
)

export default bearUI
