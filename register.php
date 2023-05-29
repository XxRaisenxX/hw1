<?php

require_once('connessione.php');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$hashed_password = password_hash($password,PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email,username,password) VALUES ('$email','$username','$hashed_password')";
if($conn->query($sql) === true){
    echo "Registrazione Effetuata Con Successo!";
} else {
    echo "Errore Durante la Registrazione $sql. " .$conn->error;
}

?>