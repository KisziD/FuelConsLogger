var fullname;
var email;
var emailValidity = false;
var password;
var passwordconf;

function nameValidate() {
    var fullnameInput = document.getElementById("name");
    fullname = fullnameInput.value;

    if (fullname != "") {
        fullnameInput.classList.remove("is-invalid");
        fullnameInput.classList.add("is-valid");
        return true;
    } else {
        fullnameInput.classList.remove("is-valid");
        fullnameInput.classList.add("is-invalid");
        return false;
    }
}

function passwordValidate() {
    var passwordInput = document.getElementById("password");
    password = passwordInput.value;
    const re = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    if (re.test(password)) {
        passwordInput.classList.remove("is-invalid");
        passwordInput.classList.add("is-valid");
        return true;
    } else {
        passwordInput.classList.remove("is-valid");
        passwordInput.classList.add("is-invalid");
        return false;
    }
}

function passwordConfirmationValidate() {
    var passwordconfInput = document.getElementById("passwordconfirm");
    passwordconf = passwordconfInput.value;
    const re = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    if (password == passwordconf && re.test(passwordconf)) {
        passwordconfInput.classList.remove("is-invalid");
        passwordconfInput.classList.add("is-valid");
        return true;
    } else {
        passwordconfInput.classList.remove("is-valid");
        passwordconfInput.classList.add("is-invalid");
        return false;
    }

}

function emailValidate() {
    var emailInput = document.getElementById("email");
    email = emailInput.value;
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (re.test(String(email).toLowerCase()) && this.responseText == "done0") {
                emailInput.classList.remove("is-invalid");
                emailInput.classList.add("is-valid");
                emailValidity = true;
            } else {
                emailInput.classList.remove("is-valid");
                emailInput.classList.add("is-invalid");
                emailValidity= false;
            }
        }
    };

    var url = "/PHP/Validate.php?email=" + email;
    xhttp.open("GET", url, true);
    xhttp.send(null);
    
}


function register() {  

    if (nameValidate()&&passwordValidate()&&passwordConfirmationValidate()&&emailValidity) {
        var xhttp = new XMLHttpRequest();
        var url = "/PHP/Register.php?name="+fullname+"&email="+email+"&password="+password;
        xhttp.open("GET", url, true);
        xhttp.send(null);
        window.location.href = 'home';
    }
    
}