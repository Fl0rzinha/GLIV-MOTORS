<?php

    session_start();

    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];

    echo "ID da conta: " . $id . "<br>";
    echo "Nome de usuário: " . $user . "<br>";
    echo "Email do usuário: " . $email . "<br>";

?>