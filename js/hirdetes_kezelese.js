const felugroablak = document.getElementById("felugroablak");
const hirdetes_kiemelese = document.getElementById("hirdetes_kiemelese");
const megsem_button = document.getElementById("megsem_button");
const hirdetes_modositasa = document.getElementById("hirdetes_modositasa");


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


hirdetes_kiemelese.addEventListener('click',()=>{

})


megsem_button.addEventListener('click', () => {
    torles_wrapper.style.display = (torles_wrapper.style.display === 'flex') ? 'none' : 'flex';
});



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


