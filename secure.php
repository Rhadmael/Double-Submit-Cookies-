<?php
session_start();

function assign_token(){
    $token_cookie = setcookie("sse-csrf", base64_encode(openssl_random_pseudo_bytes(32)), 0, "/");
    
return  $token_cookie;
}
function validateToken( $token)
{
    return urldecode($token) ==$_COOKIE['sse-csrf'];
}
assign_token();
if (!isset($_COOKIE['SSE-STC'])){
    header('Location: index.php');
    exit();
} else { 
        if (isset($_POST['csrf_token_2']) && isset($_POST['username']) && isset($_POST['email'])) {
            if (validateToken($_POST['csrf_token_2'])) {
            ?>
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Details Updated Successfully
            </div>
            <?php
            } else { ?>
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> CSRF Token not Valid
                </div>
            <?php
            }
        }
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
    <title>Home</title>
  </head>
  <body>
        <div class="login-form">
            <form id="modifyDetails" class="form-horizontal" role= "form" action="secure.php" method="post">
                <h2 class="text-center">Modify Profile</h2>       
                <div class="form-group">
                <input id="sse-st-username-new" type="text" class="form-control" name="username" value="" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input id= "sse-st-name-new" type="email" class="form-control" name ="email" value="" placeholder="email" required="required">
                </div>
                <div class="form-group">
                    <input id="sse-st-csrf" type="hidden" class="form-control" name="csrf_token_2" value=<?php echo '"' . assign_token() . '"';?>>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div> 
                 <div class="form-group">
                 <a href="./logout.php" class="btn btn-danger btn-lg btn-block">
					<span class="glyphicon glyphicon-log-out"></span> Log out
				</a>
                </div>      
            </form>
        </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html> 
<script>
function getCookie(a) {
    var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
    return b ? b.pop() : '';
}
document.getElementById('sse-st-csrf').value=getCookie('sse-csrf');
</script>