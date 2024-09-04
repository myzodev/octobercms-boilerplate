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
			xs: ['0.75rem', '150%'],
			sm: ['0.88rem', '150%'],
			base: ['1rem', '150%'],
			subheading: ['1.13rem', '150%'],
		},

		spacing: {
			unset: 'unset',
			none: 'none',
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
			136: '8.5rem',
			144: '9rem',
			152: '9.5rem',
			160: '10rem',
			168: '10.5rem',
			176: '11rem',
			184: '11.5rem',
			192: '12rem',
			200: '12.5rem',
			208: '13rem',
			216: '13.5rem',
			224: '14rem',
			232: '14.5rem',
			240: '15rem',
			248: '15.5rem',
			256: '16rem',
			264: '16.5rem',
			272: '17rem',
			280: '17.5rem',
			288: '18rem',
			296: '18.5rem',
			304: '19rem',
			312: '19.5rem',
			320: '20rem',
			328: '20.5rem',
			336: '21rem',
			344: '21.5rem',
			352: '22rem',
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
            background: '#FFFBFC',

			primary: {
				50: '#fce6eb',
				75: '#f296ac',
				100: '#ec6b8a',
				200: '#e42b57',
				300: '#df0035',
				400: '#9c0025',
				500: '#880020',
			},

			neutral: {
				10: '#fbfbfb',
				20: '#f6f6f6',
				30: '#ededed',
				40: '#e2e2e3',
				50: '#c7c7c8',
				60: '#b9b9bb',
				70: '#aeaeb0',
				80: '#a1a1a3',
				90: '#939396',
				100: '#868689',
				200: '#78787c',
				300: '#6b6b6e',
				400: '#5f5f64',
				500: '#525256',
				600: '#47474b',
				700: '#37373c',
				800: '#29292f',
				900: '#1e1e24',
			},
		},
	},

	plugins: [
		require('@tailwindcss/aspect-ratio'),

		plugin(function ({ addComponents, theme }) {
			addComponents({
				'.h1': {
					fontSize: '3rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					[`@media (min-width: ${theme('screens.md')})`]: {
						fontSize: '3.81rem',
					},
				},

				'.h2': {
					fontSize: '2.5rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					[`@media (min-width: ${theme('screens.md')})`]: {
						fontSize: '3rem',
					},
				},

				'.h3': {
					fontSize: '2.1rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					[`@media (min-width: ${theme('screens.md')})`]: {
						fontSize: '2.44rem',
					},
				},

				'.h4': {
					fontSize: '1.75rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					[`@media (min-width: ${theme('screens.md')})`]: {
						fontSize: '1.94rem',
					},
				},

				'.h5': {
					fontSize: '1.44rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					[`@media (min-width: ${theme('screens.md')})`]: {
						fontSize: '1.56rem',
					},
				},

				'.h6': {
					fontSize: '1.25rem',
					fontFamily: theme('fontFamily.heading'),
					fontWeight: theme('fontWeight.bold'),
					lineHeight: '115%',
					[`@media (min-width: ${theme('screens.md')})`]: {
						fontSize: '1.19rem',
					},
				},

                '.display': {
                    fontSize: '3rem',
                    fontFamily: theme('fontFamily.heading'),
                    lineHeight: '115%',
                    [`@media (min-width: ${theme('screens.md')})`]: {
                        fontSize: '4.2rem',
                    },
                    [`@media (min-width: ${theme('screens.lg')})`]: {
                        fontSize: '5.6rem',
                    },
                },
			})
		}),
	],
}