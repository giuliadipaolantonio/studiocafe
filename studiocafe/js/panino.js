//funzioni per la validazione del form
var validaRadio = function(){
    var n = $( "input[type=radio]:checked" ).length;
    $( "#errorePane" ).text("");
    if(n == 0){
        $( "#errorePane" ).text("Seleziona il tipo di pane").fadeIn("slow");
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

var validaAffettato = function(){
    if($('#affettato').val() === "niente"){
        $( "#erroreAffettato" ).text("Seleziona almeno l'affettato!").fadeIn("slow");
        return false
    }
    else{
        return true
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
$( "input[type=radio]" ).on( "click", () => {
    $( "#errorePane" ).text("");
} );
$('#affettato').on("click", () => {
    $("#erroreAffettato").text("");
})
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
$( "form[name=ordinaPanino]" ).on( "submit", validaDati);
$( "form[name=ordinaPanino]" ).on( "submit", validaRadio);
$( "form[name=ordinaPanino]" ).on( "submit", validaAffettato);
$( "form[name=ordinaPanino]" ).on( "submit", validaOrdine);

