<?php
include("./connect_db.php");
include("./functions.php");

$email = sanitize($_POST["email"]);

if (!empty($email)) {

  $sql = "SELECT * 
              FROM `register` 
              WHERE `email` = '$email'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    echo '<div class="alert alert-info" role="alert">E-Mail is already in use, use another email.</div>';
    header("Refresh: 2; url=./index.php?content=register");
  } else {
    $sql = "INSERT INTO `register` (`id`,
                                      `email`,
                                      `password`
                                      `userrole`)
                                      VALUES(NULL, 
                                      '$email', 
                                      'geheim',
                                      'customer')";

    $result = mysqli_query($conn, $sql);

    $id = mysqli_insert_id($conn);

    if ($result) {

      $to = $email;
      $subject = "Activate your account!";
      $message = "<!DOCTYPE html>
                            <html>
                                <head>
                                <title>Page Title</title>
                                  <style>
                                    h1 {
                                      background-color: rgb(233, 236, 239);
                                      padding: 1em;
                                      width: 50%;
                                    }
                                    body {
                                      background-color: rgb(211, 211, 211);
                                      padding: 1em;
                                    }
                                  </style>
                                </head>
                              <body>
                                <h1>Dear user,</h1>
                                <p>Thanks for regisering to loginregistratin.org.</p><br>
                                <p>To complete the registration progress click the activation link down below.</p>
                                <p>
                                  <a href='http://loginregistration.org/index.php?content=choosepassword&id=" . $id . "'>
                                  Click here to activate your account!
                                  </a>
                                </p>
                                <p>If you didn't sign up for loginregistration.org you don't have to do anything. And you can delete this mail.</p><br>
                                <p>Have a nice day!</p>
                                <p>Iwan van der Wal</p>
                                <p>CEO loginregistration.org</p>
                              </body>
                            </html>";

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: activationmail@loginregistration.org" . "\r\n";
      $headers .= "Cc: test@loginregistration.org" . "\r\n";
      $headers .= "Bcc: iambigboiyes@loginregistration.org";

      mail($to, $subject, $message, $headers);

      echo '<div class="alert alert-success" role="alert">Succes! An activation mail has been send to the given addres.</div>';
      header("refresh:4; url=./index.php?content=homepage");
    } else {
      echo '<div class="alert alert-warning" role="alert">Something went wrong, please try again.</div>';
      header("refresh:2; url=./index.php?content=register");
    }
  }
} else {
  echo '<div class="alert alert-warning" role="alert">Please enter a valid email adress!</div>';
  header("refresh:2; url=./index.php?content=register");
}
 