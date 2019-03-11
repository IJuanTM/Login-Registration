<?php
var_dump($_POST);
include("./connect_db.php");
include("./functions.php");

$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);

if (!empty($email) && !empty($password)) {
    $sql = "SELECT * 
                FROM `register` 
                WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $record = mysqli_fetch_assoc($result);

        $blowfish_password = $record["password"];

        if (password_verify($password, $blowfish_password)) { } else {
            echo '<div class="alert alert-warning" role="alert">The password is not correct, try again.</div>';
            header("refresh:2; url=./index.php?content=login-form");
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">The given email is not registered.</div>';
        header("refresh:2; url=./index.php?content=login-form");
    }
} else {
    echo '<div class="alert alert-warning" role="alert">You did not enter a password and/or email.</div>';
    header("refresh:2; url=./index.php?content=login-form");
}