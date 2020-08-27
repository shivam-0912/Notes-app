<?php
session_start();
include('connection.php');

if(isset($_GET["logout"])){
    include("logout.php");
}else{
include("rememberme.php");
}
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Notes</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>
  <body>
     
    <nav class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header ">
                <a class="navbar-brand" href="#">
                    Online Notes
                </a>
              
               
                    <button type="button" class="navbar-toggle" data-target="#collapsible" data-toggle="collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
               
            </div>
            <div class="navbar-collapse collapse" id="collapsible">
                <ul class="nav navbar-nav">
                    <!--<li ><a href="#" id="home" >Home</a></li>-->
                    <!--<li><a href="#">Help</a></li>-->
                    <!--<li><a href="#">Contact us</a></li>-->
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li class="navbar-right"><a id="homelogin" class="btn" data-toggle="modal" data-target="#loginmodal">Login</a></li>
                </ul>

              

               
            </div>

        </div>
    </nav>
    <div class="jumbotron">
    <div class="container" id="jumbotron">
        <h1>Online Notes App</h1>
        <p>Your Notes with you wherever you go. </p>
        <p>Easy to use, protects all your notes</p>
        <br />
        <br />
        <input type="submit" id="signupsumbit" class="btn-lg btn green" value="Sign up-It's free" data-target="#signupmodal" data-toggle="modal">

    </div>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <i class="fa fa-github" style="font-size:24px"></i>
          <span ><a href="https://github.com/shivam-0912">icomplex09</a> Copyright &copy; 2020</span>
        </div>
      </footer>
      <form method="post" id="signupform">
      <div class="modal" id="signupmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--close class is used to align the close icon to the right-->
                 <button class="close" data-dismiss="modal">&times;</button>
                 <h4 id="order"> Sign up today and Start using our Online Notes App!</h4>
                </div>
                <div class="modal-body">
                    <div id="signupmessage"></div>
                   
                       <div class="form-group">
                       <label for="username" class="sr-only">Username</label>
                       <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" class="form-control" placeholder="Email Address" id="email" name="email">
                     </div>
                     <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control" placeholder="Choose a passsword" id="password" name="password">
                     </div>
                     <div class="form-group">
                        <label for="cnfmpassword" class="sr-only">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm password" id="cnfmpassword" name="cnfmpassword">
                     </div>
                 
 
                </div>
                <div class="modal-footer signup">
                    <input class="btn" id="sign_up" type="submit" name="signup" value="Sign up">
                 <button class="btn cancel" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
   
      </form>
      <form method="post" id="loginform">
    <div class="modal" id="loginmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--close class is used to align the close icon to the right-->
                 <button class="close" data-dismiss="modal">&times;</button>
                 <h4 id="order"> Login:</h4>
                </div>
                <div class="modal-body">
                    <div id="loginmessage"></div>
                     <div class="form-group">
                        <label for="loginemail" class="sr-only">Email</label>
                        <input type="text" class="form-control" placeholder="Email" id="loginemail" name="loginemail">
                     </div>
                     <div class="form-group">
                        <label for="loginpassword" class="sr-only">Password</label>
                        <input type="password" class="form-control" placeholder="Passsword" id="loginpassword" name="loginpassword">
                     </div>
                   
                    <div>
                     <label for="remember"> <input type="checkbox" id="remember" name="rememberme" value="rememberme">Remember me</label>
                     
                     <a href="#forgotpswdmodal" class="pull-right" data-toggle="modal" data-dismiss="modal">Forgot Password?</a>
                    </div>
                  
 
                </div>
                <div class="modal-footer login">
                    <button class="btn pull-left" id="register" data-target="#signupmodal" data-toggle="modal" data-dismiss="modal">Register</button>
                    <input type="submit" class="btn" id="log_in" value"Login" name="login">
                    <button class="btn cancel" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
     </form>
     <form method="post" id="passwordform">
    <div class="modal" id="forgotpswdmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--close class is used to align the close icon to the right-->
                 <button class="close" data-dismiss="modal">&times;</button>
                 <h4 id="order">Forgot Password? Enter your email address:</h4>
                </div>
                <div class="modal-body">
                  <div id="passwordmessage"></div>
                     <div class="form-group">
                        <label for="forgotpswdemail" class="sr-only">Email</label>
                        <input type="text" class="form-control" placeholder="Email" id="forgotpswdemail" name="passwordemail">
                     </div>
                     
                    </form>
                    <div>
                    
                  
 
                </div>
                <div class="modal-footer forgotpswd">
                    <button class="btn pull-left" id="register" data-target="#signupmodal" data-toggle="modal" data-dismiss="modal">Register</button>
                    <input type="submit" class="btn" id="sumbit" value="Submit">
                    <button class="btn cancel" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>

   </form> 
    
   
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
  </body>
</html>