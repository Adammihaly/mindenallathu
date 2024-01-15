var hirdetesekElement = document.querySelector('.hirdeteseim');
var hirdeteseimSzovegElement = document.getElementById('hirdeteseimSzoveg');

var felhasznalokElement = document.querySelector('.megtekFelhasz');

var hirdetesekSzama = hirdetesekElement.children.length;

hirdeteseimSzovegElement.textContent = 'Hirdetéseim (' + hirdetesekSzama + '/5)';

//navigacios kod
const felugroablak = document.getElementById("felugroablak");

function  mobilnavigacio() {
    
    console.log("meghivva");

    if (felugroablak.style.display === "none" || felugroablak.style.display === "") 
    {
        felugroablak.style.display = "flex";
    } 
    else
    {
        felugroablak.style.display = "none";
    }
}

document.addEventListener('click', function (event) {
    var target = event.target;

    if (target.id === 'hirdetes_modositasa') {
        
        window.location.href = 'hirdetes_megadasa';
    }


    if (target.classList.contains('torles')) {

        var torles_wrapper = document.getElementById('torles_wrapper');

        if (torles_wrapper) 
        {
            torles_wrapper.style.display = (torles_wrapper.style.display === 'flex') ? 'none' : 'flex';
        }
    }

    if(target.id === 'hirdetes_kiemelese')
    {
        var item = target.closest('.item');

        var kiemelesBlock = item.querySelector('#kiemelve_block');

        if (kiemelesBlock) {
            kiemelesBlock.style.display = (kiemelesBlock.style.display === 'flex') ? 'none' : 'flex';
        }

    }
});