<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["iduser"]);
unset($_SESSION["nama"]);
unset($_SESSION["email"]);
unset($_SESSION["alamat"]);
unset($_SESSION["nomortelepon"]);
unset($_SESSION["pwd"]);
session_destroy();
header('Location: index.php');
exit();
