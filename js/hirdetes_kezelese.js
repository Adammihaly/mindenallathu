const felugroablak = document.getElementById("felugroablak");
const hirdetes_kiemelese = document.getElementById("hirdetes_kiemelese");
const kiemeles_block = document.getElementById("kiemelve_block");

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


hirdetes_kiemelese.addEventListener('click',()=>{

    kiemeles_block.style.display = (kiemeles_block.style.display === 'none' || kiemeles_block.style.display === '') ? 'flex' : 'none';

})