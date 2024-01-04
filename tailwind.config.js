import preset from './vendor/filament/support/tailwind.config.preset'

const defaultTheme = require('tailwindcss/defaultTheme')

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        // './resources/views/filament/pages/settings.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        // container: {
        //     // default breakpoints but with 40px removed
        //     screens: {
        //         sm: '640px',
        //         md: '800px',
        //         lg: '1012px',
        //         xl: '1240px',
        //         '2xl': '1496px',
        //     },
        // },
        extend: {
            fontFamily: {
                'sans': ['Kodchasan', ...defaultTheme.fontFamily.sans],
                'mono': ['"Azeret Mono"', ...defaultTheme.fontFamily.mono],
                'serif': ['Hepta Slab', ...defaultTheme.fontFamily.serif],
            },
        }
    }
}
