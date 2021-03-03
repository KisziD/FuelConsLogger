var email;
var password;
var emailValidity = false;

function lemailValidate() {
    var emailInput = document.getElementById("loginemail");
    email = emailInput.value;
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (re.test(String(email).toLowerCase()) && this.responseText == "1") {
                emailInput.classList.remove("is-invalid");
                emailInput.classList.add("is-valid");
                emailValidity = true;
            } else {
                emailInput.classList.remove("is-valid");
                emailInput.classList.add("is-invalid");
                emailValidity = false;
            }
        }
    };

    var url = "/PHP/Validate.php?email=" + email;
    xhttp.open("GET", url, true);
    xhttp.send(null);
}


function login() {
    var passwordInput = document.getElementById("loginpassword");
    password = passwordInput.value;

    if (emailValidity) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText=="1"){
                    window.location.href="home";
                }else{
                    passwordInput.classList.remove("is-valid");
                    passwordInput.classList.add("is-invalid");
                    passwordInput.focus();
                }
            }
        };

        var url = "/PHP/Validate.php?password=" + password+"&email="+email;
        xhttp.open("GET", url, true);
        xhttp.send(null);

    }
}

function loginByTextbox(e) {
    if(e.keyCode === 13){login();}
}