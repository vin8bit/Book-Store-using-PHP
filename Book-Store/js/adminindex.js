function bookCode(){
    var bookCode=document.forms["details-form"]["book-code"].value;
    if (bookCode=="" || bookCode.length > 8){
        document.getElementById("error").innerHTML=" Invalid book code & maximum 8 charactors";
        return false;
    }else{document.getElementById("error").innerHTML="";
        
        //ajex check duplicate book code

        
        $.ajax({
            url: "bookcode.php",
            type: "POST",
            data: {
                'bookCode': bookCode
             			
            },
           
            success: function(data){
                if(data==201){
                    document.getElementById("error").innerHTML=" Book code already exist";
                         						
                } 
                
            }
        });
        

    }
} 

function validateForm()
{
var bookCode=document.forms["details-form"]["book-code"].value;
var bookName=document.forms["details-form"]["book-name"].value;
var bookPrice=document.forms["details-form"]["book-price"].value;
var bookQuantity=document.forms["details-form"]["book-quantity"].value;
var bookAuthor=document.forms["details-form"]["book-author"].value;
var bookPublisher=document.forms["details-form"]["book-publisher"].value;
var bookCategory=document.forms["details-form"]["category"].value;
var bookImg=document.forms["details-form"]["book-img"].value;
var bookDescription=document.forms["details-form"]["description"].value;

var bookISBN=document.forms["details-form"]["book-isbn"].value;
var bookEdition = document.forms["details-form"]["book-edition"].value;


if (bookCode=="" || bookCode.length > 8){
    document.getElementById("error").innerHTML=" Invalid book code & maximum 8 charactors";
    return false;
}else{document.getElementById("error").innerHTML="";}

if (bookName=="" || bookName.length > 50){
    document.getElementById("errorname").innerHTML=" Invalid book name & maximum 50 charactors";
    return false;
}else{document.getElementById("errorname").innerHTML="";}


if (bookPrice.length==0 || bookPrice.length>4){
    document.getElementById("errorprice").innerHTML=" Invalid book price & maximum 4 digits";
    return false;
}else{document.getElementById("errorprice").innerHTML="";}

if (bookISBN.length==0 || bookISBN.length>13){
    document.getElementById("errorisbn").innerHTML=" Invalid book isbn no & 13 digits only";
    return false;
}else{document.getElementById("errorisbn").innerHTML="";}

if (bookEdition.length==0 || bookEdition.length>13){
    document.getElementById("erroredition").innerHTML=" Invalid book edition & maximum 20 charactors";
    return false;
}else{document.getElementById("erroredition").innerHTML="";}



if (bookQuantity.length==0 || bookQuantity.length>2){
    document.getElementById("errorquantity").innerHTML=" Invalid book quantity & maximum 2 digits";
    return false;
}else{document.getElementById("errorquantity").innerHTML="";}

if (bookAuthor=="" || bookAuthor.length > 30){
    document.getElementById("errorauthor").innerHTML=" Invalid book author name & maximum 30 charactors";
    return false;
}else{document.getElementById("errorauthor").innerHTML="";}

if (bookPublisher=="" || bookPublisher.length > 30){
    document.getElementById("errorpublisher").innerHTML=" Invalid book publisher name & maximum 30 charactors";
    return false;
}else{document.getElementById("errorpublisher").innerHTML="";}

if (bookCategory==""){
    document.getElementById("errorcategory").innerHTML="Please select a category";
    return false;
}else{document.getElementById("errorcategory").innerHTML="";}

if (bookImg==""){
    document.getElementById("errorimg").innerHTML="Please select a image file";
    return false;
}else{document.getElementById("errorimg").innerHTML="";}

if (bookDescription=="" || bookDescription.length > 500){
    document.getElementById("errordescription").innerHTML="Invalid  & maximum 500 charactors";
    return false;
}else{document.getElementById("errordescription").innerHTML="";}

}