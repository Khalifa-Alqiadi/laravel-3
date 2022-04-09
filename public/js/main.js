
const sel = document.getElementById("select");
const comp = document.getElementById("comp");
const cit = document.getElementById("cit");
const choose = document.querySelectorAll(".choose");
const col = document.querySelectorAll(".col");
sel.addEventListener("change", changeOpt);

function changeOpt(){
    let opt = sel.options[sel.selectedIndex];
    if(opt.value == 'company'){
        comp.style.display = "block";

    }else{
        comp.style.display = "none";
    }
    if(opt.value == "city"){
        cit.style.display = "block";
    }else{
        cit.style.display = "none";
    }
}

cit.addEventListener("click", cityValue);

function cityValue(){
    c = document.querySelectorAll(".choose");
    c.forEach((e, i) =>{
        let city = cit.options[cit.selectedIndex].value;
        if(e.innerText!=city.toUpperCase()){
            col[i].classList.add("hide");
        }else{
            
            col[i].classList.remove("hide");
        }
    })
}

comp.addEventListener("change", companyValue);

function companyValue(){
    
    choose.forEach((elemnt, index) =>{
        let company = comp.options[comp.selectedIndex].value;
          
        if(elemnt.innerText.includes(company.toUpperCase())){
            col[index].classList.remove("hide");  
        }else{
            col[index].classList.add("hide");
        }
    })
}



// function showAll(){
    
//     col.forEach((index) =>{
//         let all = sel.options[sel.selectedIndex].value;
//         if(all.value == "all"){
//             col[index].classList.remove("hide");  
//         }
//     })
// }



