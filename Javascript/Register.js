function validate() {


    var usernameInput = document.getElementById("username");
    var username = usernameInput.value;
    var nameInput = document.getElementById("name");
    var name = nameInput.value;
    var emailInput = document.getElementById("email");
    var email = emailInput.value;
    var passwordInput = document.getElementById("password");
    var password = passwordInput.value;

    if(username!="" && username.split(" ").length < 2){
        console.log(username);
    }

    
}