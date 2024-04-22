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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
<?php
    if($connessione){
        $email = mysqli_real_escape_string($connessione, $_POST['inputMail']);
        $pass = mysqli_real_escape_string($connessione, $_POST['inputPass']);

        $query = "SELECT * FROM utenti WHERE email= '$email'";
        $result = mysqli_query($connessione, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(password_verify($pass, $row['password'])){

                session_start();

                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['loggato'] = true;
                
                header("Location: areaprivata.php");
            }
            else{
                echo "<div class='container'>
                    <div class='forms' style='height: auto'>
                      <div class='form'>
                       <div class='title'> Password errata! </div>
                       <br>
                       <div class = 'text-center'>
                       <div class='text'>La password non sembra corrispondere all'email utilizzata, prova di nuovo</div>
                       <br>";
            echo "    <a href='javascript:self.history.back()'><button class='btn btn-primary'>Torna indietro</button>
                        </div>
                     </div>
                    </div>
                  </div>";
            }
        }
        else {
            echo "<div class='container'>
                  <div class='forms' style='height: auto'>
                    <div class='form'>
                      <div class='title'> Email non trovata </div>
                      <br>
                      <div class = 'text-center'>
                      <div class='text'>Non sembrano esserci account con quest'email, sei registrato?</div>
                      <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn btn-primary'>Torna indietro</button>
                     </div>
                    </div>
                  </div>
                </div>";
        }
    }
?>


</body>
</html>
