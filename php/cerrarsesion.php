<?php
session_start();
if($_SESSION['logeado']!="SI"){
    session_destroy();
    header("Location: /login.php");
}
else{
    session_destroy();
    header("Location: /login.php");
}
?>