function validation(){
    
    var email = document.forms["details-form"]["email-id2"].value;
    var name = document.forms["details-form"]["name2"].value;
    var password = document.forms["details-form"]["password2"].value;
  
    if (name=="" || name.length > 30){
        document.getElementById("error2").innerHTML=" Invalid name & maximum 30 charactors";
        return false;
    }else{document.getElementById("error2").innerHTML=""; }

    if (email=="" || email.length > 40){
        document.getElementById("error").innerHTML=" Invalid email & maximum 40 charactors";
        return false;
    }else{document.getElementById("error").innerHTML="";}

   if (password=="" || password.length > 30){
        document.getElementById("error3").innerHTML=" maximum 30 charactors";
        return false;
    }else{document.getElementById("error3").innerHTML=""; }       
  

}


