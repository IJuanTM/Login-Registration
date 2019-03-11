<?php
include("./connect_db.php");
include("./functions.php");

$password1 = sanitize($_POST["password1"]);
$password2 = sanitize($_POST["password2"]);
$id = sanitize($_POST["id"]);

if (!empty($password1) && !empty($password2)) {
    if (!strcmp($password1, $password2)) {
        $blowfish_password = password_hash($password1, PASSWORD_BCRYPT);

        $sql = "UPDATE `register` 
                    SET `password` =  '$blowfish_password' 
                    WHERE `id` = $id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div class="alert alert-success" role="alert">Your password has succesfully been set!</div>';
            header("Refresh: 4; url=./index.php?content=homepage");
        } else {
            echo '<div class="alert alert-danger" role="alert">Something went wrong, try again.</div>';
            header("Refresh: 4; url=./index.php?content=choosepassword&id=$id");
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">The given passwords are not identical, try again.</div>';
        header("Refresh: 4; url=./index.php?content=choosepassword&id=$id");
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Not all fields are filled in, enter a password in both fields.</div>';
    header("Refresh: 4; url=./index.php?content=choosepassword&id=$id");
}