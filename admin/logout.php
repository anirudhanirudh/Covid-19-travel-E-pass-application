<?php
session_start();
unset($_SESSION["aid"]);
unset($_SESSION["aemail"]);
session_destroy();
header("location:alogin.php");
?>