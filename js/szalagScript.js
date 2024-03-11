let ddlist = document.getElementById('szalagddlist');
let szovegElement = document.getElementById('szalagszoveg');

ddlist.addEventListener('change', () => {
    let kivalasztott = ddlist.options[ddlist.selectedIndex];
    let text = kivalasztott.textContent;

    szovegElement.textContent = text;
});