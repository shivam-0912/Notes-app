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
    <title>My Notes</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #allnotes{
            display: none;
        }
        #notePad,#done,.delete{
            display: none;
        }
        .clear{
            clear: both;
        }
        
        textarea{
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #CA3DD9;
            color: #CA3DD9;
            background-color: #FBEFFF;
            padding: 10px;
              
        }
        .noteheader{
            border: 1px solid grey;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 0 10px;
            background: linear-gradient(#FFFFFF,#ECEAE7);
        }
          
        .text{
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
          
        .timetext{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .notes{
            margin-bottom: 100px;
            margin-top:20px;
            
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
                    <!--<li ><a href="profile.php" id="profile" >Profile</a></li>-->
                    <!--<li><a href="#">Help</a></li>-->
                    <!--<li><a href="#">Contact us</a></li>-->
                    <!--<li><a href="#">My Notes</a></li>-->

                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    
                <li class="navbar-right"><a id="homelogin" href="index.php?logout=1">Log out</a></li>
                <li class="navbar-right"><a href="#" id="loggedin">Logged in as <b><?php echo $_SESSION["username"]; ?></b></a></li>
                </ul>

              

               
            </div>

        </div>
    </nav>
    <div class="container">
         <div id="alert" class="alert alert-danger collapse">
              <a class="close" data-dismiss="alert">
                &times;
              </a>
              <p id="alertContent"></p>
          
          </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="rowbtns">
                      <button id="addnote" type="button" class="btn btn-info btn-lg">Add Note</button>
                      <button id="edit" type="button" class="btn btn-info btn-lg pull-right">Edit</button>
                      <button id="done" type="button" class="btn  btn-lg pull-right">Done</button>
                      <button id="allnotes" type="button" class="btn btn-info btn-lg">All Notes</button>
                </div>
                <div class="clear"></div>
                 <div id="notePad">
                      <textarea rows="10"></textarea>
                  </div>
                <div id="notes" class="notes"></div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container">
             <i class="fa fa-github" style="font-size:24px"></i>
          <span ><a href="https://github.com/shivam-0912">icomplex09</a> Copyright &copy; 2020</span>
        </div>
    </footer>

    
    
   
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="mynotes.js"></script>
  </body>
</html>