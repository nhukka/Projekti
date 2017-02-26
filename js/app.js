jQuery(function() {
    
    //klikkaamalla helsinkiä sen väri vaihtuu ja aukee se n alle se slideri ja koodit kans sulkee muut jos painaa toista kaupunkia.
    
    jQuery(".hel").on("click", function() {
        jQuery(this).toggleClass('helback');
        jQuery(".hpiilo").slideToggle("400");
            jQuery(".epiilo").slideUp(".epiilo");
            jQuery(".esp").removeClass('espback');
                jQuery(".vpiilo").slideUp(".vpiilo");
                jQuery(".van").removeClass('vanback');
    });
    jQuery(".esp").on("click", function() {
        jQuery(this).toggleClass('espback');
        jQuery(".epiilo").slideToggle("400");
            jQuery(".hpiilo").slideUp(".hpiilo");
            jQuery(".hel").removeClass('helback');
                jQuery(".vpiilo").slideUp(".vpiilo");
                jQuery(".van").removeClass('vanback');
    });
    jQuery(".van").on("click", function() {
        jQuery(this).toggleClass('vanback');
        jQuery(".vpiilo").slideToggle("400");
            jQuery(".epiilo").slideUp(".epiilo");
            jQuery(".esp").removeClass('espback');
                jQuery(".hpiilo").slideUp(".hpiilo");
                jQuery(".hel").removeClass('helback');
           
    });
    


    jQuery('.vasemmalle').click(function() {
        jQuery('.hpiilo ul li').animate({
        'marginLeft' : "-=250px" //liikuttaa diviä vasemmalle
        });
    });
    jQuery('.oikealle').click(function() {
        jQuery('.hpiilo ul li').animate({
        'marginLeft' : "+=250px" //liikuttaa diviä oikeelle
        });
    });
    
    });




    
   
