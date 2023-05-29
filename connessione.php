<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'hw1';

$conn = new mysqli($host, $user, $password, $db);

if($conn->connect_error) {
    die("Connessione Al Database Fallita: " .$conn->connect_error);
}
?>