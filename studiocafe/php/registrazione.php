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
    <title>Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<?php
    if($connessione){
        $nome = mysqli_real_escape_string($connessione, $_POST['inputNome']);
        $email = mysqli_real_escape_string($connessione, $_POST['inputEmail']);
        $password = mysqli_real_escape_string($connessione, $_POST['inputPassword']);
        $conferma = mysqli_real_escape_string($connessione, $_POST['confirmPassword']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   
        //verifico che l'email non sia già usata
        $verifica = mysqli_query($connessione,
        "SELECT email FROM utenti WHERE email='$email'");
   
        if(mysqli_num_rows($verifica) != 0){
            echo "<div class='container'>
                    <div class='forms' style='height: auto'>
                      <div class='form'>
                       <div class='title'> Email già in uso </div>
                       <br>
                       <div class = 'text-center'>
                       <div class='text'>Questa email è già in uso! Se sei già registrato fai il login 
                       oppure prova ad ultilizzare un'altra email</div>
                       <br>";
            echo "    <a href='javascript:self.history.back()'><button class='btn btn-primary'>Torna indietro</button>
                        </div>
                     </div>
                    </div>
                  </div>";
        }

        //se non è già usata eseguo la query
        else{
            mysqli_query($connessione,
            "INSERT INTO utenti(nome,email,password) VALUES('$nome','$email', '$hashed_password')") 
            or die("Errore durante la registrazione" . $connessione->error);
   
            echo "<div class='container'>
                  <div class='forms' style='height: auto'>
                    <div class='form'>
                      <div class='title'> Registrazione avvenuta </div>
                      <br>
                      <div class = 'text-center'>
                      <div class='text'>La registrazione è avvenuta con successo!</div>
                      <br>";
            echo "<a href='../login.html'><button class='btn btn-primary'>Login</button>
                     </div>
                    </div>
                  </div>
                </div>";
        }
    }
?>  
</body>
</html>
