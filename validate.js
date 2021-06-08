let numInp = document.querySelector("#contact");
let nameInp = document.querySelector("#fullName");

nameInp.addEventListener('input',()=>{
    let value = Number(nameInp.value);
    if(value){
        nameInp.value="";
    }
})

numInp.addEventListener('input',()=>{
    let value = Number(numInp.value);
    if(!value){
        numInp.value="";
    } 
})

function blureffect(){
    console.log('blur');
}