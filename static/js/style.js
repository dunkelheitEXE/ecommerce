const buttonNav = document.getElementById('navBtn');
const collapse = document.getElementById('collapse');
let statusbuttonNav = false;

buttonNav.addEventListener('click', ()=>{
    if(statusbuttonNav == false) {
        collapse.classList.remove('collapse');
        collapse.classList.add('collapse-visible');
        statusbuttonNav = true
    } else if(statusbuttonNav == true){
        collapse.classList.remove('collapse-visible');
        collapse.classList.add('collapse');
        statusbuttonNav = false
    }
})