const cookiesForm = document.getElementById('cookies-form');

if (cookiesForm) {
    const buttons = cookiesForm.querySelectorAll('button');

    buttons.forEach(button => {
        button.onclick = () => {
            cookiesForm.classList.add('hidden');
        }
    });
}
