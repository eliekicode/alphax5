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
        extend: {
            fontFamily: {
                'sans': ['Lexend', ...defaultTheme.fontFamily.sans],
            },
        }
    }
}
