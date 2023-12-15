var hirdetesekElement = document.querySelector('.hirdeteseim');
var hirdeteseimSzovegElement = document.getElementById('hirdeteseimSzoveg');

var felhasznalokElement = document.querySelector('.megtekFelhasz');
var felhasznalokSzovegElement = document.getElementById('kontaktok');

var hirdetesekSzama = hirdetesekElement.children.length;
var felhasznalokSzama = felhasznalokElement.children.length;

hirdeteseimSzovegElement.textContent = 'Hirdetéseim (' + hirdetesekSzama + '/5)';
felhasznalokSzovegElement.textContent = felhasznalokSzama + ' kontakt';

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