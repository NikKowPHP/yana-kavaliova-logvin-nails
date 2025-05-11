import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './app/Livewire/**/*.php', // Add path for Livewire components
        './app/View/Components/**/*.php', // Add path for Blade components
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['-apple-system', 'BlinkMacSystemFont', "Segoe UI", 'Roboto', "Helvetica Neue", 'Arial', "Noto Sans", 'sans-serif', "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'apple-gray': {
                    50: '#f9fafb', // Ultra light gray
                    100: '#f3f4f6', // Very light gray (page background)
                    200: '#e5e7eb', // Light gray (borders, subtle backgrounds)
                    300: '#d1d5db', // Gray
                    400: '#9ca3af', // Medium gray (secondary text)
                    500: '#6b7280', // Darker gray (icons, secondary elements)
                    600: '#4b5563', // Even darker gray
                    700: '#374151', // Very dark gray (primary text)
                    800: '#1f2937', // Near black (headings)
                    900: '#111827', // Blackish
                },
                'apple-blue': {
                    light: '#3b82f6', // A lighter, vibrant blue for highlights
                    DEFAULT: '#007aff', // Apple's standard blue for links and actions
                    dark: '#0056b3',   // A darker shade for hover states
                },
                action: '#007aff', // Re-using apple-blue for generic action color
            },
            borderRadius: {
                'xl': '0.75rem', // 12px
                '2xl': '1rem',   // 16px
                '3xl': '1.5rem', // 24px
            },
            boxShadow: {
                'soft-sm': '0 1px 2px 0 rgba(0, 0, 0, 0.03)',
                'soft-md': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
                'soft-lg': '0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03)',
                'soft-xl': '0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02)',
            }
        },
    },

    plugins: [],
};
