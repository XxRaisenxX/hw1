<?php

require_once('connessione.php');

$username = $_POST['username'];
$password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $sql_select = "SELECT * FROM users WHERE username = '$username'";
    if($result = $conn->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();

                $_SESSION['loggato'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                header("location: index.php");
            }else{
                echo "la password non è corretta";
            }
        } else {
            echo "non ci sono account con quel username";
        }
    }else {
        echo "Errore in fase di login";
    }
}

$conn->close();
?>