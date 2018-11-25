<?php
session_start(); 
if($_SESSION['logeado']!="SI")
{
    header("Location: login.php");
}
?>