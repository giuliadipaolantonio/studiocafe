<?php
    session_start();

    $_SESSION = array();
    $_SESSION['loggato'] = false;

    session_destroy();

    header("location: ../index.html")
?>