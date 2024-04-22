//controllo gusti selezionati
var disabilitaCheckbox = function() {
    var n = $( "input[type=checkbox]:checked" ).length;
    if(n == 0){
    $( "#selezionati" ).text("Seleziona massimo tre gusti");
    $( "#errore" ).text("");
  }
  else if(n <= 3){
    $(":checkbox:not(:checked)").prop( "disabled", false );
    $( "#selezionati" ).text( n + (n === 1 ? " gusto selezionato" : " gusti selezionati"));
    $( "#errore" ).text("");
    if(n == 3){
        $( "#errore" ).text(" Non puoi aggiungere altri gusti!");
        $(":checkbox:not(:checked)").prop( "disabled", true );
    }
  }
}

//funzioni per la validazione del form
var validaCheckbox = function(){
    var n = $( "input[type=checkbox]:checked" ).length;
    if(n == 0){
        $( "#errore" ).text("Devi selezionare almeno un gusto!").fadeIn("slow");
        return false
    }
    else{
        return true
    }
}

var validaRadio = function(){
    var n = $( "input[type=radio]:checked" ).length;
    $( "#erroreBevanda" ).text("");
    if(n == 0){
        $( "#erroreBevanda" ).text("Seleziona il tipo di bevanda").fadeIn("slow");
        return false
    }
    else{
        return true
    }
}

var validaDati = function(){
    if(!$('#Name').val() || !$('#Surname').val()){
        $("#erroreDati").text("Inserire nome e cognome");
        if(!$('#Email').val() && !$('#Tel').val()){
            $("#erroreContatti").text("Inserire almeno un contatto");
        }
        return false;
    }
    else if(!$('#Email').val() && !$('#Tel').val()){
        $("#erroreContatti").text("Inserire almeno un contatto");
        return false;
    }
    else{
        return true;
    }
}

validaOrdine = function(){
    if(!$('#Date').val() || !$('#Time').val() || $('#Sede').val() === "niente"){
        $("#erroreRitiro").text("Inserire i dati per il ritiro dell'ordine");
        return false;
    }
    else{
        return true;
    }
}

//correzione istantanea 
$( "input[type=checkbox]" ).on( "click", disabilitaCheckbox );
$( "input[type=radio]" ).on( "click", () => {
    $( "#erroreBevanda" ).text("");
} );
$("#Name").on("click", () => {
    $("#erroreDati").text("");
})
$("#Surname").on("click", () => {
    $("#erroreDati").text("");
})
$("#Email").on("click", () => {
    $("#erroreContatti").text("");
})
$("#Tel").on("click", () => {
    $("#erroreContatti").text("");
})
$("#Date").on("click", () => {
    $("#erroreRitiro").text("");
})
$("#Time").on("click", () => {
    $("#erroreRitiro").text("");
})
$("#Sede").on("click", () => {
    $("#erroreRitiro").text("");
})

//validazione del form
$( "form[name=ordinaFrullato]" ).on( "submit", validaDati);
$( "form[name=ordinaFrullato]" ).on( "submit", validaRadio);
$( "form[name=ordinaFrullato]" ).on( "submit", validaCheckbox);
$( "form[name=ordinaFrullato]" ).on( "submit", validaOrdine);
