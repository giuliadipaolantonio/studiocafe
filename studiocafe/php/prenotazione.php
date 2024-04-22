<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
}
else {
    require("dbconn.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/riepilogo.css">
</head>
<body>
<?php

  if($connessione){  
    $nome = $_POST['inputNome'];
    $cognome = $_POST['inputCognome'];
    $email = $_POST['inputEmail'];
    $tel = $_POST['inputTel'];
    $persone = $_POST['inputPersone'];
    $sede = $_POST['inputSede'];
    $data = $_POST['inputData'];
    $orario = $_POST['inputOra'];

    $verifica = mysqli_query($connessione,
    "SELECT email FROM prenotazioni WHERE email='$email' AND nome='$nome' AND num='$persone' 
    AND sede='$sede' AND ora='$orario'");

    if(mysqli_num_rows($verifica) != 0){?>
     <div class="page w-auto h-auto" id="home">    
      <div class="card text-center mb-3">
        <div class="card-header">
          <a class="back-home" href="../index.html">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg> Torna alla home
          </a>
        </div>
        <div class="card-body">          
          <h2 class="card-title"> Prenotazione già esistente! </h2>
          <h6 class="card-subsub">Hai già effettuato una prenotazione a questo nome per quest'orario, 
            per questo numero di persone nella sede scelta.</h6>
          <a href='../prenotazione.html' class="btn btn-lg btn-light">Torna indietro</a>
        </div>
        <div class="card-footer text-muted">
            Ci scusiamo per il disagio
        </div>
      </div>
    </div>

  <?php } 
  else if(mysqli_query($connessione,
          "INSERT INTO prenotazioni(nome, email, telefono, num, data, ora, sede) 
          VALUES('$nome', '$email','$tel', '$persone', '$data', '$orario', '$sede')")){ ?>
    <div class="page w-auto h-auto" id="home">
      <div class="card text-center mb-3">
        <div class="card-header">
          <a class="back-home" href="../index.html">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg> Torna alla home
          </a>
        </div>
        <div class="card-body">          
          <h2 class="card-title"> Prenotazione effettuata! </h2>
          <h6 class="card-subsub"> <b>Registrati</b> o <b>accedi</b> per vedere tutte le prenotazioni <br>
           effettuate con la tua email!</h6>
            <br>
            <h5>Ricontrolla la tua prenotazione</h5>    
            <hr style="margin-top: 3px; margin-bottom: 5px;">
            <?php 
            echo "<p class='text-body'>";
            echo "<b>Nome</b>: $nome<br>";
            echo "<b>Cognome</b>: $cognome<br>";
            echo "<b>Telefono</b>: $tel<br>";
            echo "<b>Email</b>: $email<br>";
            echo "<b>Num. Persone</b>: $persone<br>";
            echo "<b>Data Ritiro</b>: $data<br>";
            echo "<b>Ora Ritiro</b>: $orario<br>";
            echo "<b>Sede Ritiro</b>: $sede<br>";
            echo "</p>";
            ?>
           <a href='../prenotazione.html' class="btn btn-lg btn-light">Prenota ancora</a>
        </div>
        <div class="card-footer text-muted">
            Il nostro staff elaborerà quanto prima la sua richiesta
        </div>
      </div>
    </div>
<?php } else { ?>
    <div class="page w-auto h-auto" id="home">    
      <div class="card text-center mb-3">
        <div class="card-header">
          <a class="back-home" href="../index.html">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg> Torna alla home
          </a>
        </div>
        <div class="card-body">          
          <h2 class="card-title"> Errore durante la prenotazione! </h2>
          <h6 class="card-subsub">Qualcosa è andato storto, riprova!</h6>
          <a href='../prenotazione.html' class="btn btn-lg btn-light">Torna indietro</a>
        </div>
        <div class="card-footer text-muted">
            Ci scusiamo per il disagio
        </div>
      </div>
    </div>
    <?php } 
    } 
?>
</body>
</html>