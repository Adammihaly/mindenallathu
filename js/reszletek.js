const Nagykep = document.getElementById('nagykep');

function changeImage(clickedImg)
{
    var src = clickedImg.src;

    Nagykep.src = src;
}

function showPopUp()
{
    var popup = document.getElementById('popup');
    popup.style.display = (popup.style.display === 'none' || popup.style.display ==='') ? 'flex' : 'none';
}

document.addEventListener("DOMContentLoaded", () => {
    var ElsoImg = document.querySelector('aside img').src;
    Nagykep.src = ElsoImg;
})
