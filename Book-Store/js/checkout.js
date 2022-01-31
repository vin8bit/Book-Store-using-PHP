

function validateForm()
{
var name=document.forms["details-form"]["name"].value;
var phone=document.forms["details-form"]["phone"].value;
var address=document.forms["details-form"]["address"].value;
var mode=document.forms["details-form"]["mode"].value;
var card_no=document.forms["details-form"]["card-no"].value;
var security_code=document.forms["details-form"]["security-code"].value;
var card_name=document.forms["details-form"]["card-name"].value;


if (name=="" || name.length > 30){
    document.getElementById("error1").innerHTML=" Invalid name & maximum 30 charactors";
    return false;
}else{document.getElementById("error1").innerHTML="";}

if (phone=="" || phone.length > 13){
    document.getElementById("error2").innerHTML=" Invalid phone no. & maximum 13 digits";
    return false;
}else{document.getElementById("error2").innerHTML="";}


if (address == "" || address.length>100){
    document.getElementById("error3").innerHTML=" Invalid address & maximum 100 charactors";
    return false;
}else{document.getElementById("error3").innerHTML="";}

if (mode==""){
    document.getElementById("error4").innerHTML=" Invalid payment mode";
    return false;
}else{document.getElementById("error4").innerHTML="";}

if(mode == "Debit Card" ){

    if (card_no=="" || card_no.length > 20){
        document.getElementById("error5").innerHTML=" Invalid card no & maximum 20 digits";
        return false;
    }else{document.getElementById("error5").innerHTML="";}
    
    if (security_code=="" || security_code.length > 10){
        document.getElementById("error6").innerHTML=" Invalid security code & maximum 10 digits";
        return false;
    }else{document.getElementById("error6").innerHTML="";}
    
    if (card_name=="" || card_name.length > 30){
        document.getElementById("error7").innerHTML="Invalid card name & maximum 30 charactors";
        return false;
    }else{document.getElementById("error7").innerHTML="";}

}

}
