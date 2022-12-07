const nomproduit = document.getElementById('nomproduit');
const quantiteproduit = document.getElementById('quantiteproduit');
const prixproduit = document.getElementById('prixproduit');
const categorieproduit = document.getElementById('categorieproduit');
const submitbtn = document.getElementById('submitbtn');



var quantitelength = 2;
var prixlength = 8;
var nomlength = 50;




quantiteproduit.addEventListener("input",()=>{
    submitbtn.removeAttribute('disabled');  //areter le fonctionnement du bouton ajouter
    if(testquantite()){
        submitbtn.setAttribute('disabled',true);

    }
});



prixproduit.addEventListener("input",()=>{
    submitbtn.removeAttribute('disabled');
    if(testprix()){
        submitbtn.setAttribute('disabled',true);
    }
});


nomproduit.addEventListener("input",()=>{
    submitbtn.removeAttribute('disabled');
    if(testnom()){
        submitbtn.setAttribute('disabled',true);
    }
});


nomproduit.addEventListener("input",()=>{
    submitbtn.removeAttribute('disabled');
    if(testnom()){
        submitbtn.setAttribute('disabled',true);
    }
});


categorieproduit.addEventListener("input",()=>{
    submitbtn.removeAttribute('disabled');
    if(testcategorie()){
        submitbtn.setAttribute('disabled',true);
    }
});




function testquantite(){  
    const lengthQ = quantiteproduit.value.length;
    const matches = quantiteproduit.value.match(/[^0-9]/g) || [];

    if(matches.length>0 || lengthQ>quantitelength){
        return true;
    }
}

function testprix(){
    const lengthP = prixproduit.value.length;
    const matches = prixproduit.value.match(/[^0-9]/g) || [];

    if(matches.length>0 || lengthP>prixlength){
        return true;
    }
}



function testnom(){
    
    const lengthN = nomproduit.value.length;
    if(lengthN>nomlength){
        return true;
    }
}


function testcategorie(){
    if(categorieproduit.value==""){
        return true;
    }
}








