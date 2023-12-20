document.addEventListener('click', function (event) {
    
    var target = event.target;

    if (target.id === 'csomagvaltas_gomb') {
        
        window.location.href = 'csomagvaltas.html';
    }
})