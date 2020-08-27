// console.log("linked");
$("#signupform").submit(function(event){
    // console.log("working");
    //prevents the default php evaluation
    event.preventDefault();
    //collecting data
    var datatopost=$(this).serializeArray();
    // console.log(datatopost);
    //ajax call
    $.ajax({
        url:"signup.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            $("#signupmessage").html(data);
        },
        error:function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the ajax call.Please try again later.</div>");
        }
    });

});

$("#loginform").submit(function(event){
    // console.log("working");
    //prevents the default php evaluation
    event.preventDefault();
    //collecting data
    var datatopost=$(this).serializeArray();
    // console.log(datatopost);
    //ajax call
    $.ajax({
        url:"login.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data=="success")
            {
                window.location="mainpage.php";
            }else{
            $("#loginmessage").html(data);
            }
        },
        error:function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the ajax call.Please try again later.</div>");
        }
    });

});
$("#passwordform").submit(function(event){
    // console.log("working");
    //prevents the default php evaluation
    event.preventDefault();
    //collecting data
    var datatopost=$(this).serializeArray();
    // console.log(datatopost);
    //ajax call
    $.ajax({
        url:"forgotpassword.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            
         
            $("#passwordmessage").html(data);
            
        },
        error:function(){
            $("#passwordmessage").html("<div class='alert alert-danger'>There was an error with the ajax call.Please try again later.</div>");
        }
    });

});