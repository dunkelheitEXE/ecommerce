const colToHide = document.getElementsByClassName('colToHide');
const text = document.getElementsByClassName('text-table');
const hiddenImage = document.getElementsByClassName('hiddenTextImg');

function resizeable() {
    if(window.innerWidth < 800) {
        for(let i=0;i<hiddenImage.length; i++) {
            hiddenImage[i].classList.remove('htimg-non');
            text[i].classList.add('htimg-non');
        }

        for (let i = 0; i < colToHide.length; i++) {
            colToHide[i].classList.add('colToHide-nonvisible');
        }
    } else {
        for(let i=0;i<hiddenImage.length; i++) {
            hiddenImage[i].classList.add('htimg-non');
            text[i].classList.remove('htimg-non');
        }

        for (let i = 0; i < colToHide.length; i++) {
            colToHide[i].classList.remove('colToHide-nonvisible');
        }
    }
}



window.addEventListener('DOMContentLoaded', ()=>{
    let inttt = setInterval(resizeable, 100);
})


window.addEventListener('resize', ()=>{
    resizeable();
});