
$(document).ready(function () {

    /* Navbar */
    $(window).on("scroll", () => {
        var scroll = $(window).scrollTop();
        if(scroll > 150) {
            $(".navbar").addClass("navbar-scrolled");
        }
        else{
            $(".navbar").removeClass("navbar-scrolled");
        }
    })
    
    /* Banner Image */
    $("#blue").addClass("change");
    $("#café").width(116);
})

/*Services*/

function mostra(scritta){
    scritta.style.visibility = 'visible';
    document.body.style.cursor = 'pointer';
}

function nascondi(scritta){
    scritta.style.visibility = 'hidden';
    document.body.style.cursor = 'default';
}


