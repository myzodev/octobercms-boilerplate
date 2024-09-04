if (document.getElementById('cookie-bar')) {
	const cookiesWrapper = document.getElementById('cookie-bar')
	const allowButtons = cookiesWrapper.querySelectorAll('.button-allow-all')
	const denyButtons = cookiesWrapper.querySelectorAll('.button-deny-all')
	const selectionButtons = cookiesWrapper.querySelectorAll('.button-allow-selection')
	const cookiesFormInputs = cookiesWrapper.querySelectorAll('input[type=checkbox]')

	const hideCookieBar = () => {
		cookiesWrapper.classList.add('animate-slide-out')
		cookiesWrapper.onanimationend = () => cookiesWrapper.remove()
	}

	const initButtons = (buttons, checked = null) => {
		buttons.forEach((button) => {
			button.onclick = () => {
				if (checked !== null) {
					cookiesFormInputs.forEach((input) => {
						if (!input.required) {
							input.checked = checked
						}
					})
				}

				hideCookieBar()
			}
		})
	}

	initButtons(allowButtons, true)
	initButtons(denyButtons, false)
	initButtons(selectionButtons)
}
