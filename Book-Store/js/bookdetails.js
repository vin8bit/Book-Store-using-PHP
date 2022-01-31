function checkQnt() {

    
   
    var qnt2 = Number($('#qnt2').val());
    var qnt =Number($('#qnt').val());
    var qnt2 =Number($('#qnt2').val());
    var price =Number($('#price').val());
    var name = document.getElementById("span_Id").innerText;
    var code =$('#code').val();
    var img =$('#img5').val();
    var total = price*qnt;
   
    if (qnt <= qnt2 && qnt != 0){
        
        document.getElementById("qntspan").innerHTML= "";
   

    $.ajax({
        url: "addtocart.php",
        method: "POST",
        data: {
            code: code,
            name: name,
            price: price,
            qnt: qnt,
            qnt2: qnt2,
            total: total,
            img: img
        
          
        },
        success: function(data) {
            alert(data);
            
        }
    });
    }else{ 

        document.getElementById("qntspan").innerHTML= "Only "+qnt2+ ' Left !';

        }
     
}