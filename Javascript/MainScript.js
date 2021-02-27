function validate() {
    
    UnameElement = document.getElementById("username");
    Uname = UnameElement.value;
    PassElement = document.getElementById("password");
    Password = PassElement.value;
     if(Uname!=""){
        UnameElement.classList.remove("is-invalid"); 
        UnameElement.classList.add("is-valid");
         
         if(Password != ""){
             PassElement.classList.remove("is-invalid");
            PassElement.classList.add("is-valid");
         }else{
            PassElement.classList.add("is-invalid");
         }         
     }else{
        UnameElement.classList.add("is-invalid");
     }

}