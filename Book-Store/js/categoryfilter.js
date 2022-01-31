
var slider = document.getElementById("myRange");
var slider2 = document.getElementById("myRange2");
var mini=1,maxi=9999;
slider.addEventListener('change', function() {
    document.getElementById("minimum").innerHTML=slider.value;
    mini = slider.value;
  
});

slider2.addEventListener('change', function() {
    if(slider.value > slider2.value){
        document.getElementById("maximum").innerHTML='9999';
        maxi = 9999;
      
    }else{
        document.getElementById("maximum").innerHTML=slider2.value;
        maxi = slider2.value;
     
    } 

});


function categoryFilter() {

    var action = 'fetch_data';
    var category = $('#category-filter').val();
    if (category != ""){
        document.getElementById("category-title").innerHTML=category;

    }else{document.getElementById("category-title").innerHTML="All Types Books";}
     

    $.ajax({
        url: "fetchbook.php",
        method: "POST",
        data: {
            action: action,
            category: category,
            mini: mini,
            maxi: maxi
          
        },
        success: function(data) {
            $('.book-container2').html(data);
            
        }
    });
}

function searchButton(){
    var searchValue = $('#search-value').val();
  
       
        $.ajax({
            url: "fetchbook2.php",
            method: "POST",
            data: {
                searchValue: searchValue
            },
            success: function(data) {
                $('.book-container2').html(data);
                
                document.getElementById("category-title").innerHTML="All Types Books";
            }
        });
   
}