
$.ajax({
    url: "checksession.php",
    method: "POST",
    success: function(data) {
        if (data != "201") {
            document.getElementById("login-div").innerHTML="<a href='logout.php'><button>Log Out</button></a>";
           
        } else {
            document.getElementById("login-div").innerHTML="<a href='login.php'><button>Login</button><button>Sign Up</button></a>";
        }
        
    }
});


