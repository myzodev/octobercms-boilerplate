const cookiesBar = document.getElementById('cookies-bar')

if (cookiesBar) {
    const buttons = cookiesBar.querySelectorAll('button')

    buttons.forEach(button => {
        button.onclick = () => {
            cookiesBar.classList.add('cookies-animate-out')
        }
    })

    cookiesBar.addEventListener('animationend', () => {
        cookiesBar.remove()
    })
}
