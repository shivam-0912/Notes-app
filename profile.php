<?php
session_start();

if(!isset($_SESSION["user_id"]))
{
    
    header('location:index.php',true);
}
// echo "<div style='margin-top:50px'>hi". $_SESSION['user_id']."</div>";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <style>
       td{
          
           border:1px solid rgba(0,0,0,0.1);
           color: black;
       }
       tr{
           cursor: pointer;
       }
    </style>
  </head>
  <body>
     
    <nav class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header ">
                <a class="navbar-brand" href="mainpage.php">
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
                    <!--<li ><a href="#" id="profile" >Profile</a></li>-->
                    <!--<li><a href="#">Help</a></li>-->
                    <!--<li><a href="#">Contact us</a></li>-->
                    <!--<li><a href="mainpage.php">My Notes</a></li>-->

                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    
                <li class="navbar-right"><a id="homelogin" href="index.php?logout=1">Log out</a></li>
                <li class="navbar-right"><a href="#" id="loggedin">Logged in as <b><?php echo $_SESSION["username"]; ?></b></a></li>
                </ul>

              

               
            </div>

        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <h2>General User Settings:</h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <!--<tr data-toggle="modal" data-target="#usernamemodal">-->
                        <tr>
                            <td >Username</td>
                            <td><?php echo $_SESSION['username']; ?></td>
                        </tr>
                        <!--<tr data-toggle="modal" data-target="#emailmodal">-->
                        <tr>
                            <td>Email</td>
                            <td><?php echo $_SESSION['email']; ?></td>
                        </tr>
                        <!--<tr data-toggle="modal" data-target="#passwordmodal">-->
                        <tr>
                            <td>Password</td>
                            <td>hidden</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
                

    <footer class="footer mt-auto py-3">
        <div class="container">
          <span ><a href="https://github.com/shivam-0912">icomplex09</a> Copyright &copy; 2020</span>
        </div>
    </footer>
    <div class="modal" id="usernamemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--close class is used to align the close icon to the right-->
                 <button class="close" data-dismiss="modal">&times;</button>
                 <h4 id="order"> Edit Username:</h4>
                </div>
                <div class="modal-body">
                   <form method="post">
                       <div class="form-group">
                       <label for="updateusername">Username</label>
                       <input type="text" class="form-control" placeholder="Username" id="updateusername">
                    </div>
                   
                   </form>
 
                </div>
                <div class="modal-footer">
                    <button class="btn" id="sumbit">Submit</button>
                    <button class="btn cancel" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="emailmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--close class is used to align the close icon to the right-->
                 <button class="close" data-dismiss="modal">&times;</button>
                 <h4 id="order"> Enter new email:</h4>
                </div>
                <div class="modal-body">
                   <form method="post">
                       <div class="form-group">
                       <label for="updateemail">Email:</label>
                       <input type="text" class="form-control" placeholder="email" id="updateemail">
                    </div>
                   
                   </form>
 
                </div>
                <div class="modal-footer">
                    <button class="btn" id="sumbit">Submit</button>
                    <button class="btn cancel" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="passwordmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--close class is used to align the close icon to the right-->
                 <button class="close" data-dismiss="modal">&times;</button>
                 <h4 id="order"> Enter Current and New Password:</h4>
                </div>
                <div class="modal-body">
                   <form method="post">
                       <div class="form-group">
                       <label for="updatecurrent" class="sr-only">Current Password:</label>
                       <input type="password" class="form-control" placeholder="Your Current Password" id="updatecurrent">
                    </div>
                    <div class="form-group">
                        <label for="updatenew" class="sr-only">New Password:</label>
                        <input type="password" class="form-control" placeholder="Choose a password" id="updatenew">
                     </div>
                     <div class="form-group">
                        <label for="updateconfirm" class="sr-only">Confirm Password:</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" id="updateconfirm">
                     </div>
                   
                   </form>
 
                </div>
                <div class="modal-footer">
                    <button class="btn" id="sumbit">Submit</button>
                    <button class="btn cancel" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>

    
    
   
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>