var simpleGomb = document.getElementById('simpleGomb');
var premiumGomb = document.getElementById('premiumGomb');
var valtasGomb = document.querySelector('.valtasGomb');
var arElement = document.querySelector('.ar');
var kepElement = document.querySelector('.baloldal');

premiumGomb.addEventListener('click', () => {
    arElement.style.display = 'flex';
    valtasGomb.textContent = 'Csatlakozás a prémiumhoz';

    simpleGomb.classList.remove('sk_s');
    simpleGomb.classList.add('pk_s');

    premiumGomb.classList.remove('sk_p');
    premiumGomb.classList.add('pk_p');

    kepElement.style.backgroundImage = 'url("../img/plusz_inverted.jpg")';
});

simpleGomb.addEventListener('click', () => {
    arElement.style.display = 'none';
    valtasGomb.textContent = 'Váltás prémiumra';

    simpleGomb.classList.remove('pk_s');
    simpleGomb.classList.add('sk_s');

    premiumGomb.classList.remove('pk_p');
    premiumGomb.classList.add('sk_p');

    kepElement.style.backgroundImage = 'url("../img/plusz.jpg")';
});