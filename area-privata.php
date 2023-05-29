<?php
session_start();
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true ){
    header("location: index.php");
    exit;
}
?>
