const plugin = require('tailwindcss/plugin')

module.exports = {
	content: [
		'./layouts/**/*.htm',
		'./pages/**/*.htm',
		'./partials/**/*.htm',
		'./src/**/*.js',
		'../../plugins/**/*.htm',
		'../../plugins/**/*.js',
	],

	theme: {
		extend: {
			zIndex: {
				60: '60',
				70: '70',
				80: '80',
				90: '90',
				100: '100',
			},

			keyframes: {
				'slide-out': {
					'0%': { transform: 'translateY(0)' },
					'100%': { transform: 'translateY(100%)' },
				},
			},

			animation: {
				'slide-out': 'slide-out 250ms ease-in-out both',
			},
		},

		screens: {
            sm: '580px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            '2xl': '1536px',
        },

        container: {
            center: true,
            padding: '1.5rem',
        },

		fontFamily: {
			heading: ['Lato', 'sans-serif'],
			body: ['NunitoSans', 'sans-serif'],
		},

		fontSize: {
			xs: ['0.75rem', '1.13rem'],
			sm: ['0.88rem', '1.31rem'],
			base: ['1rem', '1.5rem'],
			subheading: ['1.13rem', '1.69rem'],
		},

		spacing: {
			unset: 'unset',
			0: 0,
			1: '0.063rem',
			2: '0.125rem',
			3: '0.188rem',
			4: '0.25rem',
			5: '0.313rem',
			6: '0.375rem',
			7: '0.438rem',
			8: '0.5rem',
			9: '0.563rem',
			10: '0.625rem',
			16: '1rem',
			24: '1.5rem',
			32: '2rem',
			40: '2.5rem',
			48: '3rem',
			56: '3.5rem',
			64: '4rem',
			72: '4.5rem',
			80: '5rem',
			88: '5.5rem',
			96: '6rem',
			104: '6.5rem',
			112: '7rem',
			120: '7.5rem',
			128: '8rem',
			136: '9.5rem',
			144: '10rem',
			152: '10.5rem',
			160: '11rem',
			168: '11.5rem',
			176: '12rem',
			184: '12.5rem',
			192: '13rem',
			200: '13.5rem',
			208: '14rem',
			216: '14.5rem',
			224: '15rem',
			232: '15.5rem',
			240: '16rem',
			full: '100%',
		},

		borderRadius: {
			0: 0,
			4: '4px',
			8: '8px',
			16: '16px',
			24: '24px',
			32: '32px',
			40: '40px',
			48: '48px',
			56: '56px',
			64: '64px',
			full: '999px',
		},

		colors: {
			transparent: 'transparent',

			primary: {
				50: '#e6f7fd',
				100: '#6bd0f6',
				200: '#2bbcf2',
				300: '#00aeef',
				400: '#007aa7',
				500: '#006a92',
			},

			secondary: {
				50: '#E6FFFA',
				100: '#6BFFE4',
				200: '#2BFFD9',
				300: '#00FFD1',
				400: '#00B392',
				500: '#009C7F',
			},

			success: {
				50: '#edf3ea',
				100: '#98bc88',
				200: '#6b9f54',
				300: '#4d8b31',
				400: '#366122',
				500: '#2f551e',
			},

			warning: {
				50: '#fefae8',
				100: '#fae177',
				200: '#f8d43d',
				300: '#f7cb15',
				400: '#ad8e0f',
				500: '#977c0d',
			},

			error: {
				50: '#feeae6',
				100: '#f9856d',
				200: '#f6502f',
				300: '#f42c04',
				400: '#ab1f03',
				500: '#951b02',
			},

			neutral: {
				10: '#fafafb',
				20: '#f5f6f6',
				30: '#eceded',
				40: '#e0e1e2',
				50: '#c3c6c7',
				60: '#b5b8ba',
				70: '#a9adaf',
				80: '#9a9fa1',
				90: '#8c9194',
				100: '#7d8387',
				200: '#6f7679',
				300: '#61686c',
				400: '#555c61',
				500: '#464f53',
				600: '#3a4348',
				700: '#293339',
				800: '#1b252b',
				900: '#0f1a20',
			},
		},
	},

	plugins: [
		require('@tailwindcss/aspect-ratio'),

		plugin(function ({ addComponents, theme }) {
			addComponents({
				'.h1': {
					fontSize: '3.81rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					'@media (max-width: 1024px)': {
						fontSize: 'calc(3rem + 1.5vw)',
					},
				},

				'.h2': {
					fontSize: '3rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					'@media (max-width: 1024px)': {
						fontSize: 'calc(2.5rem + 0.9vw)',
					},
				},

				'.h3': {
					fontSize: '2.44rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					'@media (max-width: 1024px)': {
						fontSize: 'calc(2.1rem + 0.6vw)',
					},
				},

				'.h4': {
					fontSize: '1.94rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					'@media (max-width: 1024px)': {
						fontSize: 'calc(1.75rem + 0.3vw)',
					},
				},

				'.h5': {
					fontSize: '1.56rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					'@media (max-width: 1024px)': {
						fontSize: '1.44rem',
					},
				},

				'.h6': {
					fontSize: '1.25rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					'@media (max-width: 1024px)': {
						fontSize: '1.19rem',
					},
				},

                '.display': {
                    fontSize: '5.63rem',
                    fontFamily: theme('fontFamily.heading'),
                    lineHeight: '115%',
                    '@media (max-width: 1024px)': {
                        fontSize: 'calc(4.2rem + 2vw)',
                    },
                },
			})
		}),
	],
}
