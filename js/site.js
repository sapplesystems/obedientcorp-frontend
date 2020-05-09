
 var tpj=jQuery;
 tpj(document).ready(function() {
       tpj("#burgernavbar").click(function(){ //Sandeep burger clicked menu appeared
        console.log('clicked burger');
		tpj('#home').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#about').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#legal').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#bankers').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#products').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#realestate').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#gallery').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#contact_us').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#login').removeClass("animated fadeOutUp1").css("opacity","0");
        tpj(".topBar").slideDown(400);
        tpj("#burgernavbar").hide(1000);
		tpj("#burgernavbarcancel").show(1000);
        setTimeout(function(){tpj('#home').addClass("animated fadeInDown1").css("opacity","0");
    }, 100);//200
		 setTimeout(function(){tpj('#about').addClass("animated fadeInDown1").css("opacity","0");
    }, 200);//400
		setTimeout(function(){tpj('#legal').addClass("animated fadeInDown1").css("opacity","0");
    }, 300);//600
	    setTimeout(function(){tpj('#bankers').addClass("animated fadeInDown1").css("opacity","0");
    }, 400);//800
	    setTimeout(function(){tpj('#products').addClass("animated fadeInDown1").css("opacity","0");
    }, 500);//1000
		setTimeout(function(){tpj('#realestate').addClass("animated fadeInDown1").css("opacity","0");
    }, 600);//1200
		setTimeout(function(){tpj('#gallery').addClass("animated fadeInDown1").css("opacity","0");
    }, 700);//300
		setTimeout(function(){tpj('#contact_us').addClass("animated fadeInDown1").css("opacity","0");
    }, 800);//300
		setTimeout(function(){tpj('#login').addClass("animated fadeInDown1").css("opacity","0");
    }, 900);//300
      //  tpj('body').css('overflow-y','hidden');        
    });
   

    tpj(".iconCancel").click(function(){    //Sandeep when menu is closed using close button
		//tpj('.topMenu').css("opacity","1").removeClass("animated fadeInDown85");
		tpj('#home').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#about').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#legal').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#bankers').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#products').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#realestate').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#gallery').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#contact_us').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#login').removeClass("animated fadeInDown1").css("opacity","1");
		 
		   setTimeout(function(){tpj('#home').addClass("animated fadeOutUp1").css("opacity","0");
    }, 900);  //1400
		 setTimeout(function(){tpj('#about').addClass("animated fadeOutUp1").css("opacity","0");
    }, 800);   //1200
		setTimeout(function(){tpj('#legal').addClass("animated fadeOutUp1").css("opacity","0");
    }, 700);   //1000
	    setTimeout(function(){tpj('#bankers').addClass("animated fadeOutUp1").css("opacity","0");
    }, 600);    //800
	    setTimeout(function(){tpj('#products').addClass("animated fadeOutUp1").css("opacity","0");
    }, 500);    //600
		setTimeout(function(){tpj('#realestate').addClass("animated fadeOutUp1").css("opacity","0");
    }, 400);    //400
		setTimeout(function(){tpj('#gallery').addClass("animated fadeOutUp1").css("opacity","0");
    }, 300);    //200
		setTimeout(function(){tpj('#contact_us').addClass("animated fadeOutUp1").css("opacity","0");
    }, 200);    //200
		setTimeout(function(){tpj('#login').addClass("animated fadeOutUp1").css("opacity","0");
    }, 100);    //200

	 setTimeout(function(){ tpj(".topBar").slideUp(400); //400
   
  
     
    // tpj("#burgernavbar").show(1000);
	   //tpj("#burgernavbarcancel").hide(1000);
    }, 1200);   //1800
	 setTimeout(function(){ //tpj(".topBar").slideUp(400);
       tpj("#burgernavbar").show(800);    //800
	   tpj("#burgernavbarcancel").hide(800); //800
    }, 575);   //1150
        
	
    
    });
   
//logo will come 
    setTimeout(function () {
        tpj('#main-logo').addClass("animated fadeInDown");
    }, 1500);   //3000
//logo will come
    setTimeout(function () {
        tpj('#main-logo-inner').addClass("animated fadeInDown");
    }, 1000);   //2000
//hamburger animation
    setTimeout(function () {
        tpj('.hamburger3').addClass("animated fadeInDown5x");
    }, 2500);   //5000
    setTimeout(function () {
        tpj('.hamburger2').addClass("animated fadeInDown5x");
    }, 2650);   //5300
    setTimeout(function () {
        tpj('.hamburger1').addClass("animated fadeInDown5x");
    }, 2750);   //5500
//hamburger animation
    setTimeout(function () {
        tpj('.hamburger3-inner').addClass("animated fadeInDown5x");
    }, 2000);//4000
    setTimeout(function () {
        tpj('.hamburger2-inner').addClass("animated fadeInDown5x");
    }, 2150);//4300
    setTimeout(function () {
        tpj('.hamburger1-inner').addClass("animated fadeInDown5x");
    }, 2250);//4500	



});

