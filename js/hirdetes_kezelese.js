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