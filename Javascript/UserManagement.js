
  $(document).ready(function(){    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText!="false"){
                document.getElementById("username").innerHTML=this.responseText;                   
            }
        }
    };
    var url = "/PHP/Validate.php?loggedin";
    xhttp.open("GET", url, true);
    xhttp.send(null);  
});