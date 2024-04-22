<?php 
  define('DB_USER', 'root');
  define('DB_PASS', 'root');
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'studiocafe');

  $connessione = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if (mysqli_connect_errno()){
    die('Impossibile stabilire una connessione con il database' . mysqli_error($connessione));
  }

?>