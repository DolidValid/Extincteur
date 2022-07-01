<?php
session_start();
session_destroy();
unset($_SESSION['logged_in']);
 
header("Location: http://localhost/extincteur/controller/controller_login.php");
die();