<?php
@session_start();
// echo "<div style='margin-top:50'>".$_COOKIE["rememberme"]."&&&&".$_SESSION["user_id"]."</div>";
include("connection.php");
if(!isset($_SESSION["user_id"]) && !empty($_COOKIE["rememberme"])){
    //getting authentificators from cookie
    // echo "<div style='margin-top:50'>".$_COOKIE["rememberme"]."</div>";
    list($authentificator1,$f1authentificator2)=explode(',',$_COOKIE["rememberme"]);
    $authentificator2=hex2bin($f1authentificator2);
    $f2authentificator2=hash('sha256',$authentificator2);
    $sql="SELECT * FROM rememberme WHERE authentificator1='$authentificator1'";
    $results = mysqli_query($link, $sql);
    if(!$results){
        echo  '<div class="alert alert-danger">There was an error running the query.</div>'; 
        exit;
    }
    $result=mysqli_num_rows($results);
    if($result!==1){
        echo '<div class="alert alert-danger">Remember me process failed!</div>';
        exit;
    }
    $row=mysqli_fetch_array($results);
    if(!hash_equals($row['f2authentificator2'], $f2authentificator2)){
        echo '<div class="alert alert-danger">hash_equals returned false.</div>';
        exit;
    }
    else{
        //generate new authentificators
        //Store them in cookie and rememberme table
        $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
        //2*2*...*2
        $authentificator2 = openssl_random_pseudo_bytes(20);
        //Store them in a cookie
        function f1($a, $b){
            $c = $a . "," . bin2hex($b);
            return $c;
        }
        $cookieValue = f1($authentificator1, $authentificator2);
        setcookie(
            "rememberme",
            $cookieValue,
            time() + 1296000
        );
        
        //Run query to store them in rememberme table
        function f2($a){
            $b = hash('sha256', $a); 
            return $b;
        }
       $f2authentificator2=f2($authentificator2);
        $expiration=date('Y-m-d H:i:s', time() + 1296000);
        $user_id=$row["user_id"];
       $sql = "INSERT INTO rememberme
        (`authentificator1`, `f2authentificator2`, `user_id`, `expires`)
        VALUES
        ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
          $results = mysqli_query($link, $sql);
        if(!$results){
            echo  '<div class="alert alert-danger">There was an error storing data to remember you next time.</div>'.mysqli_error($link);  
        }
        $_SESSION['user_id'] = $row['user_id'];
        @header("location:mainpage.php",true);
        
    }
}

?>