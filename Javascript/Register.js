
function nameValidate() {
    var nameInput = document.getElementById("name");
    var name = nameInput.value;

    if(name!=""){
        nameInput.classList.remove("is-invalid");
        nameInput.classList.add("is-valid");
    }else{
        nameInput.classList.remove("is-valid");
        nameInput.classList.add("is-invalid");
    }
}

function passwordValidate() {    
}

function usernameValidate() {
}

function emailValidate() {
}

/*function validate() {


    var usernameInput = document.getElementById("username");
    var username = usernameInput.value;
   
    var emailInput = document.getElementById("email");
    var email = emailInput.value;
    var passwordInput = document.getElementById("password");
    var password = passwordInput.value;

    if(username!="" && username.split(" ").length < 2){
        console.log(username);
    }
    
}*/