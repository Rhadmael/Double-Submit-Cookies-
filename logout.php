<?php
    session_start();
    session_destroy(); 
    unset($_COOKIE['SSE-STC']);
    unset($_COOKIE['sse-csrf']);
	setcookie ("SSE-STC", "", time()-3600, '/'); 
	setcookie ("sse-csrf", "", time()-3600, '/'); 

    

    header('Location: index.php');
?>