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
    


    jQuery(".h_vasen").click(function() {
        jQuery(".hpiilo ul a").animate({
            left:'+=300px'
        });
       
    });
     jQuery(".h_oikea").click(function() {
        jQuery(".hpiilo ul a").animate({
            left:'-=300px'
        });
       
    });
    
    jQuery(".e_vasen").click(function() {
        jQuery(".epiilo ul a").animate({
            left:'+=300px'
        });
       
    });
     jQuery(".e_oikea").click(function() {
        jQuery(".epiilo ul a").animate({
            left:'-=300px'
        });
       
    });
    jQuery(".v_vasen").click(function() {
        jQuery(".vpiilo ul a").animate({
            left:'+=300px'
        });
       
    });
     jQuery(".v_oikea").click(function() {
        jQuery(".vpiilo ul a").animate({
            left:'-=300px'
        });
       
    });
    
    
     //tää on valikon responsiiviuus
    var menuLink = jQuery('.menu-item').first();
    //console.log(menuLink);
    
    menuLink.click(function () {
        jQuery('.menu-item:not(:first)').slideToggle(400);
    });
   

    
    });
         




    
   
