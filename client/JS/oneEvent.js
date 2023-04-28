const button = document.querySelector('.descriptionEvent');
const description = document.querySelector('.descriptionSlide');

button.addEventListener('click', () => {
    description.classList.toggle('appearSlide');
});

const buttonClose = document.querySelector('.buttonCloseDescrip');

buttonClose.addEventListener('click', () => {
    description.classList.toggle('appearSlide');
});