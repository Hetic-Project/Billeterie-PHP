const burger = document.querySelector('.burger');
console.log(burger)
burger.addEventListener('click', () =>{
    const menu = document.querySelector('.nav');
    menu.classList.add("appear");
    console.log(menu)
})