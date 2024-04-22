//funzioni per la validazione del form

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
    if(!$('#Date').val() || !$('#Time').val() || !$('#Persone').val() || $('#Sede').val() === "niente"){
        $("#errorePrenotazione").text("Inserire tutti i dati per la prenotazione");
        return false;
    }
    else{
        return true;
    }
}

//correzione istantanea 
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
    $("#errorePrenotazione").text("");
})
$("#Time").on("click", () => {
    $("#errorePrenotazione").text("");
})
$("#Persone").on("click", () => {
    $("#errorePrenotazione").text("");
})
$("#Sede").on("click", () => {
    $("#errorePrenotazione").text("");
})

//validazione del form
$( "form[name=prenotazione]" ).on( "submit", validaDati);
$( "form[name=prenotazione]" ).on( "submit", validaOrdine);

