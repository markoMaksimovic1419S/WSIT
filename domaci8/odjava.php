<?php
    session_start();
    unset($_SESSION['ulogovan']);
    unset($_SESSION['korisnik']);
    header("location: index.php");
?>

