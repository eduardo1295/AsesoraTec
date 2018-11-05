<?php
session_start();
if($_SESSION['logeado']!="SI"){
    header("Location: http://localhost/proyecto/login.php");
}
else{
    session_destroy();
    header("Location: /login.php");
}

?>