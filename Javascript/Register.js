function nameValidate() {
    var nameInput = document.getElementById("name");
    var name = nameInput.value;

    if (name != "") {
        nameInput.classList.remove("is-invalid");
        nameInput.classList.add("is-valid");
        return true;
    } else {
        nameInput.classList.remove("is-valid");
        nameInput.classList.add("is-invalid");
        return false;
    }
}

function passwordValidate() {
    var passwordInput = document.getElementById("password");
    var password = passwordInput.value;
    const re =/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    if(re.test(password)){
        passwordInput.classList.remove("is-invalid");
        passwordInput.classList.add("is-valid");
        return true;
    }else{
        passwordInput.classList.remove("is-valid");
        passwordInput.classList.add("is-invalid");
        return false;
    }
}

function passwordConfirmationValidate() {
    var passwordconfInput = document.getElementById("passwordconfirm");
    var passwordconf = passwordconfInput.value;
    var passwordInput = document.getElementById("password");
    var password = passwordInput.value;
    const re =/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    if (password==passwordconf&&re.test(passwordconf)) {        
        passwordconfInput.classList.remove("is-invalid");
        passwordconfInput.classList.add("is-valid");
        return true;
    } else {
        passwordconfInput.classList.remove("is-valid");
        passwordconfInput.classList.add("is-invalid");
        return false;
    }    
    
}


function usernameValidate() {
    var usernameInput = document.getElementById("username");
    var username = usernameInput.value;

}

function emailValidate() {
    var emailInput = document.getElementById("email");
    var email = emailInput.value;   
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(re.test(String(email).toLowerCase())){
        emailInput.classList.remove("is-invalid");
        emailInput.classList.add("is-valid");
        return true;
    }else{
        emailInput.classList.remove("is-valid");
        emailInput.classList.add("is-invalid");
        return false;
    }
}