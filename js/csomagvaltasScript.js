//simple session gombok
var ss_simpleGomb = document.getElementById('ss_simpleGomb');
var ss_premiumGomb = document.getElementById('ss_premiumGomb');
//premium session gombok
var ps_simpleGomb = document.getElementById('ps_simpleGomb');
var ps_premiumGomb = document.getElementById('ps_premiumGomb');

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