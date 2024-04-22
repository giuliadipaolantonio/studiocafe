<?php 
session_start();
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: ../index.html");
    exit;
}; 
require("dbconn.php");
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Privata</title>

<!-- CSS Bootstrap & Personale -->
<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../css/menu.css">

<!-- JS Bootstrap & JQuery -->
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script defer src="../js/script.js"></script>

</head>

<body>
<!-- Header-->
<header>
    <div class="navbar navbar-text fixed-top text-end">
    </div>
</header>
        <div class="container mt-2 py-5">
            <div class="mt-5 mb-4 rounded-5">
              <div class="container-fluid p-5 text-center">
                <h1><?php echo "Ciao, " . $_SESSION['nome'];?></h1>
                <p>
                  Qui puoi trovare tutte le prenotazioni e tutte le ordinazioni effettuate tramite la tua email 
                  <?php echo $_SESSION['email'] ?>
                </p>
                <a href="logout.php" class="btn btn-sm btn-danger" 
                style="margin: 10px 5px 0 5px; text-transform: uppercase; 
                letter-spacing: .090em; font-weight: 500; font-size: 14px;"> Logout </a>
              </div>
            </div>
      
            <div class="row g-4 align-items-md-stretch">
              <div class="col-lg-12">
                <div class="h-100 p-5 text-bg-light rounded-5 text-center">
                  <h2>Le tue prenotazioni</h2>
                  <p>
                  <?php
                    $query = "SELECT * FROM prenotazioni WHERE email= '$email'";
                    $result = mysqli_query($connessione, $query);
                    if($result){
                    $i = 1;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      echo "<b> Prenotazione n." .$i . "</b><br>";
                      echo "👤<u>Nome</u>: " . $row['nome'] . "<br>";
                      echo "🔢<u>N.Persone</u>: " . $row['num'] . "<br>";
                      echo "🗓<u>Data</u>: " . $row['data'] . "<br>";
                      echo "⏰<u>Ora</u>: " . $row['ora'] . "<br>";
                      echo "📍<u>Sede</u>: " . $row['sede'] . "<br>";
                      echo "<br>";
                      $i++;
                    }
                    }
                  ?>  
                  </p>
                </div>
              </div>
            </div>
            <br>
            <div class="row g-4 align-items-md-stretch">
              <div class="col-lg-6">
                <div class="h-100 p-5 text-bg-light rounded-5 text-center">
                  <h2>I tuoi panini</h2>
                  <p>
                  <?php
                    $query = "SELECT * FROM panini WHERE email= '$email'";
                    $result = mysqli_query($connessione, $query);
                    if($result){
                    $i = 1;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      echo "<b> Ordine n." .$i . "</b><br>";
                      echo "🍞<u>Pane</u>: " . $row['pane'] . "<br>";
                      echo "🥩<u>Affettato</u>: " . $row['affettato'] . "<br>";
                      echo "🧀<u>Formaggio</u>: " . $row['formaggio'] . "<br>";
                      echo "🥬<u>Verdure</u>: " . $row['verdura'] . "<br>";
                      echo "🗓<u>Data Ritiro</u>: " . $row['data'] . "<br>";
                      echo "⏰<u>Ora Ritiro</u>: " . $row['ora'] . "<br>";
                      echo "📍<u>Luogo Ritiro</u>: " . $row['sede'] . "<br>";
                      echo "<br>";
                      $i++;
                    }
                    }
                  ?> 
                  </p>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="h-100 p-5 text-bg-light rounded-5 text-center">
                  <h2>I tuoi frullati</h2>
                  <p>
                    <?php
                    $query = "SELECT * FROM frullati WHERE email= '$email'";
                    $result = mysqli_query($connessione, $query);
                    if($result){
                    $i = 1;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      echo "<b> Ordine n." .$i . "</b><br>";
                      echo "🥤<u>Bevanda</u>: " . $row['bevanda'] . "<br>";
                      echo "🍓<u>Gusti</u>: " . $row['gusto1'] . " " . $row['gusto2'] . " " . $row['gusto3'] . "<br>";
                      echo "🗓<u>Data Ritiro</u>: " . $row['data'] . "<br>";
                      echo "⏰<u>Ora Ritiro</u>: " . $row['ora'] . "<br>";
                      echo "📍<u>Luogo Ritiro</u>: " . $row['sede'] . "<br>";
                      echo "<br>";
                      $i++;
                    }
                    }
                    ?> 
                    <br>
                  </p>
                </div>
              </div>
            </div>

        </div>    

      
    <!-- Footer -->
    <footer class="py-1 py-md-5 mt-5" id="copyright">
      <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">
          <div class="mb-3">
            <div class="d-inline-flex align-items-center mb-2 text-body-emphasis">
            <span class="fs-5">Studio Café</span>
          </div>
          <div class="mb-2 small">&copy; Linguaggi e Tecnologie Web 2022/2023</div>
          <p class="float-end"><a href="#">Back to top</a></p>
        </div>
      </div>
    </div>
  </footer>
    
</body>
</html>