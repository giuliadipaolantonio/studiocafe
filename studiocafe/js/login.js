/* effetti grafici */
const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

/* VALIDA FORM */
//funzioni per la validazione del form
  var validaNome = function(){
    if(!$("#regNome").val()){
        $( "#erroreNome" ).text("Devi inserire un nome").fadeIn("slow");
        return false
    }
    else if(!isNaN(parseInt($("#regNome").val()))){
      $( "#erroreNome" ).text("Il nome non può essere un numero").fadeIn("slow");
        return false
    }
    else{
        return true
    }
  }
  var validaEmail = function(){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = $("#regMail").val();
    if(!email){
        $( "#erroreEmail" ).text("Devi inserire un email").fadeIn("slow");
        return false
    }
    else if(!regex.test(email)){
      $( "#erroreEmail" ).text("Inserire un'email valida").fadeIn("slow");
      return false
    }
    else{
        return true
    }
  }
  
  var validaPassword = function(){
    var password = $("#regPass").val();
    //validazione password
    var lunghezza = /^.{8,16}$/;
    var maiuscole = /[A-Z]+/;
    var minuscole = /[a-z]+/;
    var numero = /[0-9]+/;
    var carspeciale = /[!@#$%^&()'[\]"?+-/*={}.,;:_]+/;

    if(!password){
        $( "#errorePass" ).text("Devi inserire una password").fadeIn("slow");
        return false;
    }
    else if(!lunghezza.test(password)){
      $( "#errorePass" ).text("La password deve essere lunga tra gli 8 e 16 caratteri").fadeIn("slow");
      return false
    }
    else if(!maiuscole.test(password)){
      $( "#errorePass" ).text("La password deve contenere almeno una lettera maiuscola").fadeIn("slow");
      return false
    }
    else if(!minuscole.test(password)){
      $( "#errorePass" ).text("La password deve contenere almeno una lettera minuscola").fadeIn("slow");
      return false
    }
    else if(!numero.test(password)){
      $( "#errorePass" ).text("La password deve contenere almeno un numero").fadeIn("slow");
      return false
    }

    else if(!carspeciale.test(password)){
      $( "#errorePass" ).text("La password deve contenere almeno un carattere speciale").fadeIn("slow");
      return false
    }
    else{
        return true
    }
  }
  
 var confermaPassword = function(){
    if($("#regPass").val() != $("#confPass").val()){
        $( "#erroreConf" ).text("Le password non corrispondono").fadeIn("slow");
        return false
    }
    else{
        return true
    }
  }

  var validaTermini = function(){
    if(!($("#termCon").is(':checked'))){
        $( "#erroreCheck" ).text("Devi accettare termini e condizioni per proseguire").fadeIn("slow");
        return false
    }
    else{
        return true
    }
  }

  //correzione istantanea
  $("#regNome").on("click", () => {
    $("#erroreNome").text("");
  })
  $("#regMail").on("click", () => {
    $("#erroreEmail").text("");
  })
  $("#regPass").on("click", () => {
    $("#errorePass").text("");
  })
  $("#confPass").on("click", () => {
    $("#erroreConf").text("");
  })
  $("#termCon").on("click", () => {
    $("#erroreCheck").text("");
  })

  //validazione del form
  $( "#regForm" ).on( "submit", validaNome);
  $( "#regForm" ).on( "submit", validaEmail);
  $( "#regForm" ).on( "submit", validaPassword);
  $( "#regForm" ).on( "submit", confermaPassword);
  $( "#regForm" ).on( "submit", validaTermini);

  

  