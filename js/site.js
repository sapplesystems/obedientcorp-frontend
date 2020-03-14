
 var tpj=jQuery;
 tpj(document).ready(function() {
       tpj("#burgernavbar").click(function(){ //Sandeep burger clicked menu appeared
        console.log('clicked burger');
		tpj('#project').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#offices').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#about').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#serviceNav').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#news').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#career').removeClass("animated fadeOutUp1").css("opacity","0");
		tpj('#contact').removeClass("animated fadeOutUp1").css("opacity","0");
        tpj(".topBar").slideDown(400);
        tpj("#burgernavbar").hide(1000);
		tpj("#burgernavbarcancel").show(1000);
        setTimeout(function(){tpj('#project').addClass("animated fadeInDown1").css("opacity","0");
    }, 100);//200
		 setTimeout(function(){tpj('#offices').addClass("animated fadeInDown1").css("opacity","0");
    }, 200);//400
		setTimeout(function(){tpj('#about').addClass("animated fadeInDown1").css("opacity","0");
    }, 300);//600
	    setTimeout(function(){tpj('#serviceNav').addClass("animated fadeInDown1").css("opacity","0");
    }, 400);//800
	    setTimeout(function(){tpj('#news').addClass("animated fadeInDown1").css("opacity","0");
    }, 500);//1000
		setTimeout(function(){tpj('#career').addClass("animated fadeInDown1").css("opacity","0");
    }, 600);//1200
	setTimeout(function(){tpj('#contact').addClass("animated fadeInDown1").css("opacity","0");
    }, 150);//300
      //  tpj('body').css('overflow-y','hidden');        
    });
   

    tpj(".iconCancel").click(function(){    //Sandeep when menu is closed using close button
		//tpj('.topMenu').css("opacity","1").removeClass("animated fadeInDown85");
		tpj('#project').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#offices').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#about').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#serviceNav').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#news').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#career').removeClass("animated fadeInDown1").css("opacity","1");
		tpj('#contact').removeClass("animated fadeInDown1").css("opacity","1");
		 
		   setTimeout(function(){tpj('#project').addClass("animated fadeOutUp1").css("opacity","0");
    }, 700);  //1400
		 setTimeout(function(){tpj('#offices').addClass("animated fadeOutUp1").css("opacity","0");
    }, 600);   //1200
		setTimeout(function(){tpj('#about').addClass("animated fadeOutUp1").css("opacity","0");
    }, 500);   //1000
	    setTimeout(function(){tpj('#serviceNav').addClass("animated fadeOutUp1").css("opacity","0");
    }, 400);    //800
	    setTimeout(function(){tpj('#news').addClass("animated fadeOutUp1").css("opacity","0");
    }, 300);    //600
		setTimeout(function(){tpj('#career').addClass("animated fadeOutUp1").css("opacity","0");
    }, 200);    //400
	setTimeout(function(){tpj('#contact').addClass("animated fadeOutUp1").css("opacity","0");
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

