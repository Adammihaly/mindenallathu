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

})