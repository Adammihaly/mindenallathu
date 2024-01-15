var szam = 0;
const elso = document.getElementById("elso");
const masodik = document.getElementById("masodik");
const harmadik = document.getElementById("harmadik");
const negyedik = document.getElementById("negyedik");
const otodik = document.getElementById("otodik");
const feladat_szama = document.getElementById("szam")

const tomb = [elso, masodik, harmadik, negyedik,otodik];

const elore_gomb = document.getElementById("elore");
const hatra_gomb = document.getElementById("hatra");
const submit_gomb = document.getElementById("submit_gomb")
const felugroablak = document.getElementById("felugroablak");
const kiemeles = document.getElementById("kiemeles");
const info = document.getElementById("info");




function szamlalo()
{
   for (let i =0;i<tomb.length; i++)
    {
      
        if(szam===i)
        {
            tomb[i].style.width = "100%";
            tomb[i].style.height = "100%";
            tomb[i].style.padding = "5%";
        }
        else
        {
            tomb[i].style.width = "0";
            tomb[i].style.height = "0";
            tomb[i].style.padding = "0";   
        }

    }

    hatra_gomb.disabled = szam === 0;
    elore_gomb.disabled = szam === tomb.length - 1;


    switch (true) {
        case szam === tomb.length - 1:
            elore_gomb.style.display = "none";
            submit_gomb.style.display = "flex";
            break;
    
        case szam < tomb.length - 1:
            elore_gomb.style.display = "flex";
            submit_gomb.style.display = "none";
            break;
           
    }

    
    
    // if(szam===tomb.length-2)
    // {
    //     elore_gomb.style.width = "20%";
    //     elore_gomb.innerHTML = "Hirdetés feladása";
    // }
    // else
    // {
    //     elore_gomb.style.width = "10%";
    //     elore_gomb.innerHTML = "Tovább";
    // }
    
    
}

elore_gomb.onclick = function ()
{
    szam++;
    feladat_szama.textContent = szam +1;
    szamlalo();

}

hatra_gomb.onclick = function (){
    szam--;
    feladat_szama.textContent = szam +1;
    szamlalo();

}

szamlalo();

var hiba_uzenet = document.getElementById("hiba_uzenet");

document.getElementById("hirdetes_cim").addEventListener("input", function() {
            var inputValue = this.value;
            var isValid = validateInput(inputValue);
            if(isValid)
            {
                hiba_uzenet.style.opacity = 0;
            }
            else
            {
                hiba_uzenet.style.opacity = 1;
            }
        
        });

function validateInput(inputValue) 
{
    if(inputValue.length >= 12 && inputValue.length <= 70) 
        return true;
    else
        return false

            
}


function validateForm() {
    var form = document.querySelector('form');
    var elements = form.elements;

    for (var i = 0; i < elements.length; i++) {
        if (elements[i].hasAttribute('required') && elements[i].value.trim() === '') {
            alert("A(z) " + elements[i].name + " nincs kitöltve. Kérlek töltsd ki a csillagozott mezőket!");
            return false;
        }
    }

    // Continue with form submission if all required fields are filled
    return true;
}


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

kiemeles.addEventListener('click',()=>{

    info.style.opacity = 1;
})