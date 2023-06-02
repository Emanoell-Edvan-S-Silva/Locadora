const form = document.getElementById('form')
const email = document.getElementById('email')
const senha = document.getElementById('senha')



form.addEventListener("submit", (e) =>{
    e.preventDefault();
});


function checkInputs() {
    const emailvalue = email.value.trim();
    const senhavalue = senha.value.trim();

    if(emailvalue == ''){
        setErrorFor(email, "O nome de usuario é obrigatório")
    }
}
function setErrorFor(input, message){
    const formControl = input.parentElement;
    const small = formControl.queryselector("small");


    small.innerText = message;

    formControl.className = "field form-control error padding-bottom--24"
}