document.addEventListener('DOMContentLoaded',function(){

    eventListeners();


});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
};


function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');

    }

    /**                     TOGGLE 
        Es un metodo de .classList que te ayuda a reducir el 
    codigo que tenemos arriba, basicamente, si no tiene la 
    clase,la agregaria y si la tiene la quitaria.

             navegacion.classList.toggle('mostrar') 
    */
}