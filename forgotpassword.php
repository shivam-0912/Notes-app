<?php
session_start();
include("connection.php");

//error messages
 $missingemail = '<p>Please enter your email address!</p>';
$invalidemail = '<p>Please enter a valid email address!</p>';
$errors='';
//Get email
if(empty($_POST["passwordemail"])){
    $errors .= $missingemail;   
}else{
    $email = filter_var($_POST["passwordemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidemail;   
    }
}

if(strlen($errors)>0){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
    
}
//checking in database
$email=mysqli_real_escape_string($link,$email);
$sql="SELECT * FROM users WHERE email='$email'";
$results=mysqli_query($link,$sql);
if(!$results)
{
    echo '<div class="alert alert-danger">Error running the query.</div>';
    exit;
    
}
$result=mysqli_num_rows($results);

if(!$result){
      echo '<div class="alert alert-danger">The email id is not registered with us.Please click on register to sign up.</div>';
      exit;
}

//preparing variable to input in forgotpassword table
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
$user_id=$row["user_id"];
$time=time();
$key=bin2hex(openssl_random_pseudo_bytes(16));
$status="pending";

$sql = "INSERT INTO forgotpassword (`user_id`, `rkey`, `time`, `status`) VALUES ('$user_id', '$key', '$time', '$status')";
$results = mysqli_query($link, $sql);
if(!$results){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}
//sending mail with user id and activation key

$message = "Please click on this link to reset your password:\n\n";
$message .= "http://random0912.000webhostapp.com/resetpassword.php?user_id=$user_id&key=$key";
if(mail($email,'Reset your password',$message))
{
     echo "<div class='alert alert-success'>An email has been sent to $email. Please click on the link to reset your password.</div>";
}

?>