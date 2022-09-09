document.addEventListener('DOMContentLoaded',function(){

    eventListeners();

    modeDark();

});

function modeDark() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode')
    } else {
        document.body.classList.remove('dark-mode')
    }

    prefiereDarkMode.addEventListener('change', function(){
            
        if(prefiereDarkMode.matches) {
            if(prefiereDarkMode.matches) {
                document.body.classList.add('dark-mode')
            } else {
                document.body.classList.remove('dark-mode')
            }
            document.body.classList.add('dark-mode')
        } else {
            document.body.classList.remove('dark-mode')
        }
    })

    const darkModeBoton = document.querySelector('.dark-mode-boton');

    darkModeBoton.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');

        // if(darkModeBoton.classList.contains('dark-mode')){
        //     darkModeBoton.classList.remove('dark-mode');
        // } else {
        //     darkModeBoton.classList.add('dark-mode')
        // };
    });
};

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