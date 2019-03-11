<?php
    // Hier worden de belangrijke constanten gedefineerd voor het maken van en verbinding
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "am1a-loginregistration-2018");

// Maakt verbinding met de database
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
 