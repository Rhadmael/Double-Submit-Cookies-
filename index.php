<?php
session_start();
$r=session_id();

    if (isset($_POST['username']) && isset($_POST['password'])){
            if($_POST['username'] == "admin" && $_POST['password']=="password"){
                    $_SESSION['SSE-ST']=$_POST['username'];
                    $r=session_id();
                    setcookie("SSE-STC", $r, 0, "/"); 
                    header('Location: secure.php');
                    exit();
            }else { ?>
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Please check Username and password
                </div>
            <?php }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Double Submit Cookies</title>
  </head>
  <body>
    <?php if (!isset($_COOKIE['SSE-STC'])){ ?>
        <div class="login-form">
            <form action="index.php" method="post">
                <h2 class="text-center">Log in</h2>       
                <div class="form-group">
                <input id="sse-st-username" type="text" class="form-control" name="username" value="" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input id= "sse-st-password" type="password" class="form-control" name =" password" value="" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>       
            </form>
        </div>
    <?php } else{  ?>
        <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Hold on a second
                </div>
        <?php header('Location: secure.php'); }
    ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html> 