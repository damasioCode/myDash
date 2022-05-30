
//moldal
const modal = document.querySelector('.modal');
const btnClose = document.querySelector('.modal .close');
const btnOpen = document.querySelector('.open__login');
if (btnOpen) {
btnOpen.addEventListener('click', () => {
    modal.classList.toggle('open');
});
}
if (btnClose) {
btnClose.addEventListener('click', () => {
    modal.classList.toggle('open');
});
}
window.addEventListener('click', ( event ) => {
    if (event.target == modal) {
        modal.classList.toggle('open');
    }
});

//show pass
const passWrapper = document.querySelectorAll('.input__box.password');
passWrapper.forEach( item => {
    const passField = item.querySelector('input');
    const eyes = item.querySelector('.input__icon.eyes');

    eyes.addEventListener('click', (event) => {
        event.currentTarget.classList.toggle('show');
        passField.type = passField.type === 'password' ? 'text' : 'password';
    });
});
// .modal__wrapper form .input__box .password .eyes

const openDropdown = document.querySelector('.open__dropdown');
const dropdown = document.querySelector('.user__dropdown');
openDropdown.addEventListener('click', (event) => {
    dropdown.classList.toggle('active');
});

