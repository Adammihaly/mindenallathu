document.addEventListener('click', function (event) {
    
    var target = event.target;

    if (target.id === 'kezelopult_nav') {
        
        window.location.href = 'fooldal.html';
    }

    if(target.id === 'hirdetes_feleadasa_nav')
    {
        window.location.href = 'hirdetes_megadasa.html'
    }

    if(target.id === 'csomagvalasztas_nav')
    {
        window.location.href = 'csomagvaltas.html'
    }

    if(target.id === 'hirdetesek_kezelese_nav')
    {
        window.location.href = 'hirdetesek_kezelese.html'
    }

    if(target.id === 'hirdetes_feladas_nav')
    {
        window.location.href = 'hirdetes_megadasa.html'
    }

    if(target.id === 'profil_modositasa_nav')
    {
        window.location.href = 'profil_modositasa.html'
    }

})


function  mobilnavigacio() {
    

    if (felugroablak.style.display === "none" || felugroablak.style.display === "") 
    {
        felugroablak.style.display = "flex";
    } 
    else
    {
        felugroablak.style.display = "none";
    }
}