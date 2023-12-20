import plugin from 'tailwindcss/plugin'
import colors from 'tailwindcss/colors'

const bearUI = plugin(
  function () {},
  {
    content: [
      './resources/**/*{.php,.blade.php}'
    ],
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
            "2.5": .025,
            "7.5": .075,
            "15": .15,
        },
      },
    }
  }
)

export default bearUI
