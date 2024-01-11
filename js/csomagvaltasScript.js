//desktop dolgok
//simple session gombok
var ss_simpleGomb = document.getElementById('ss_simpleGomb');
var ss_premiumGomb = document.getElementById('ss_premiumGomb');
//premium session gombok
var ps_simpleGomb = document.getElementById('ps_simpleGomb');
var ps_premiumGomb = document.getElementById('ps_premiumGomb');

//session kezeles
var simpleSession = document.querySelector('.simpleSession');
var premiumSession = document.querySelector('.premiumSession');

ss_premiumGomb.addEventListener('click', () => {
    premiumSession.style.display = 'flex';
    simpleSession.style.display = 'none';
});

ps_simpleGomb.addEventListener('click', () => {
    premiumSession.style.display = 'none';
    simpleSession.style.display = 'flex';
});

//mobil dolgok
//simple session gombok
var ss_simpleGomb_mobil = document.getElementById('ss_simpleGomb_mobil');
var ss_premiumGomb_mobil = document.getElementById('ss_premiumGomb_mobil');

//premium session
var ps_simpleGomb_mobil = document.getElementById('ps_simpleGomb_mobil');
var ps_premiumGomb_mobil = document.getElementById('ps_premiumGomb_mobil');

//session kezeles
var simpleSession_mobil = document.querySelector('.mobilSimple');
var premiumSession_mobil = document.querySelector('.mobilPremium');

ss_premiumGomb_mobil.addEventListener('click', () => { 
    premiumSession_mobil.style.display = 'flex';
    simpleSession_mobil.style.display = 'none';
});

ps_simpleGomb_mobil.addEventListener('click', () => {
    premiumSession_mobil.style.display = 'none';
    simpleSession_mobil.style.display = 'flex';
});

//navigacio kod
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
        
        window.location.href = 'hirdetes_megadasa.html';
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