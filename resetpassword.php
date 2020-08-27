<?php
//The user is re-directed to this file after clicking the reset password link
//reset password link contains two GET parameters: user_id and key
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Password Reset</title>
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <style>
            h1{
                color:purple;   
            }
            .contactForm{
                border:1px solid #7c73f6;
                margin-top: 50px;
                border-radius: 15px;
            }
        </style> 

    </head>
        <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Password reset</h1>
            <div id="resultmessage"></div>
<?php
//If email or activation key is missing show an error
if(!isset($_GET['user_id']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the activation link you received by email.</div>'; exit;
}
//else
    //Store them in two variables
$user_id = $_GET['user_id'];
$key = $_GET['key'];
    //Prepare variables for the query
$user_id = mysqli_real_escape_string($link, $user_id);
$key = mysqli_real_escape_string($link, $key);

$time=time()-86400;

    //Run query: set activation field to "activated" for the provided email
$sql = "SELECT * FROM forgotpassword WHERE user_id='$user_id' AND rkey='$key' AND time > '$time' AND status='pending'";

$results = mysqli_query($link, $sql);
if(!$results)
{
    echo "<div class='alert alert-danger'>Error running the query.</div>";
    exit;
    
}
$result=mysqli_num_rows($results);
if(!$result){
   echo '<div class="alert alert-danger">Please try again.</div>';
    exit;
}
echo "
<form method=post id='passwordreset'>
<input type=hidden name=key value=$key>
<input type=hidden name=user_id value=$user_id>
<div class='form-group'>
    <label for='password'>Enter your new Password:</label>
    <input type='password' name='password' id='password' placeholder='Enter Password' class='form-control'>
</div>
<div class='form-group'>
    <label for='password2'>Re-enter Password::</label>
    <input type='password' name='password2' id='password2' placeholder='Re-enter Password' class='form-control'>
</div>
<input type='submit' name='resetpassword' class='btn btn-success btn-lg' value='Reset Password'>


</form>
";
?>
            
        </div>
    </div>
</div>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
         <script>
             //Once the form is submitted
            $("#passwordreset").submit(function(event){ 
                //prevent default php processing
                event.preventDefault();
                //collect user inputs
                var datatopost = $(this).serializeArray();
            //    console.log(datatopost);
                //send them to signup.php using AJAX
                $.ajax({
                    url: "storeresetpassword.php",
                    type: "POST",
                    data: datatopost,
                    success: function(data){

                        $('#resultmessage').html(data);
                    },
                    error: function(){
                        $("#resultmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

                    }

                });

            });           
            
            </script>
        
    </script>
        </body>
</html>