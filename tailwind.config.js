/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // Custom colors for LiverCare AI
        'accent-teal': '#14B8A6',
        'accent-blue': '#3B82F6',
        'deep-navy': '#020617',
        'success': '#10B981',
        'danger': '#EF4444',
        'warning': '#F59E0B',
        'info': '#06B6D4',
        // Keep existing colors
        'emerald': {
          400: '#34d399',
          500: '#10b981',
          600: '#059669',
        },
        'cyan': {
          400: '#22d3ee',
          500: '#06b6d4',
          600: '#0891b2',
        },
      },
      fontFamily: {
        'sans': ['Plus Jakarta Sans', 'Inter', 'system-ui', 'sans-serif'],
        'display': ['Space Grotesk', 'system-ui', 'sans-serif'],
      },
      animation: {
        'gradient': 'gradient 3s ease infinite',
        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        gradient: {
          '0%, 100%': {
            'background-size': '200% 200%',
            'background-position': 'left center'
          },
          '50%': {
            'background-size': '200% 200%',
            'background-position': 'right center'
          },
        },
      },
      backgroundImage: {
        'grid-pattern': "url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M60 0H0V60H60V0ZM1 1H59V59H1V1Z\" fill=\"%2314B8A6\" fill-opacity=\"0.05\"/%3E%3C/svg%3E')",
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}