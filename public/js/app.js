

const username = document.getElementById("username");
const fullname = document.getElementById("fullname");
const email = document.getElementById("email");
const pass = document.getElementById("password");
const form = document.getElementById("signup");

form.addEventListener("submit", (e) =>{
    e.preventDefault();
    localStorage.setItem('username', username.value);
    localStorage.setItem('fullname', fullname.value);
    localStorage.setItem('email', email.value);
    localStorage.setItem('password', pass.value);
    alert("Successfully added.");
	window.location = "login.html";
});

const login = document.getElementById("login");
const full = document.getElementById("full");
const password = document.getElementById("pass");

login.addEventListener("submit", (e) => {
    e.preventDefault();
    checkStorage();
    alert("Successfully added.");
	window.location = "../index.html";
});

let nameUser = localStorage.getItem("fullname");
let passUser = localStorage.getItem("password");

function checkStorage(){
    if(full.value == nameUser){
        sessionStorage.setItem("NameUser", full.value);
    }else{
        setError(full, "Sory This User Is Not Exist");
    }
    if(password.value == passUser){
        sessionStorage.setItem("PassUser", password.value);
    }else{
        setError(password, "Sory This Password Is Not Mache");
    }
}

function setError(input, mess){
    const formControl = input.parentElement;
    const p = formControl.querySelector("p");

    p.innerText = mess;

    formControl.className = "masg error";
}
