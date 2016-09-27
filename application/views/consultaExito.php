<!DOCTYPE html>
<html>
<head>

	<title>SourceSistemas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url()?>custombox/dist/custombox.min.css">
	<link rel="icon" type="image/png" href="<?php echo base_url()?>img/source-ico.ico" />
	
	
	
	
	
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
			</div>   
			<div class="single-page-nav sticky-wrapper" id="tmNavbar">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url();?>index.php/inicio">volver</a></li>
<!-- 					<li><a href="#section2">Quienes somos</a></li> -->
<!-- 					<li><a href="#section3">Servicios</a></li> -->
<!-- 					<li><a href="#section4">Contacto</a></li> -->
<!-- 					<li><a href="http://www.facebook.com/templatemo" class="external" target="_blank">Externo</a></li> -->
				</ul>
			</div>   
		</div>
	</nav>    




		<div id="section1" >
		<header id="header-area" class="intro-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="header-content">
							<label>Su consulta se realizo con exito.</label>
							<label>Nos comunicaremos con usted a la brevedad.</label>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	
	
		
			</div>
			

					<!-- Start Footer Area -->
					<footer id="footer-area">
						<div class="container">
							<div class="row text-center">
								<div class="col-sm-12">
									<div class="footer-content">
										<h1></h1>
										<p> 
											<br></p>
										</div>                
									</div>
								</div>
							</div>
							<hr>
							<div class="container">
								<div class="row">
									<div class="col-sm-12 text-center">             
										<p class="copy">Copyright &copy; 2016 sourceSistemas   </p>
									</div>
								</div>
							</div>
						</footer>
						<!-- End Footer Area -->

						<script src="js/jquery-1.11.2.min.js"></script>
						<script src="js/jquery.scrollUp.min.js"></script> <!-- https://github.com/markgoodyear/scrollup -->
						<script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
						<script src="js/parallax.js-1.3.1/parallax.js"></script> <!-- http://pixelcog.github.io/parallax.js/ -->
						<script src="custombox/dist/custombox.min.js"></script>
						<script>



var last = "";
var idAux="";
function cleanLast(){
	  $("#"+idAux).css("overflow","hidden");
	  $("#"+idAux).css("cursor","pointer");
	  $("#"+idAux).find("p").css("background-color","#F2F2F2");
	  
	  idAux = "";
	  last ="";
	
}

function modal(unId){
  
  if(unId != last){
	  idAux=unId;
		$("#"+unId).find("p").css("background-color","white");

	  
  $("#"+unId).removeStyle("overflow");
  $("#"+unId).removeStyle("cursor");
	 Custombox.open({
         target: '#'+unId,
         effect: 'fadein',
         close : cleanLast
     });
  
  
  last = unId;
    
  }
	
}


function validar(){

var flag = 0;
$(".form-control").each(function(index,item){

var valor = $(item).val();

if(valor == ""){
	flag =1;
}
	
});


var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

// Se utiliza la funcion test() nativa de JavaScript
if (!regex.test($('#email').val().trim())) {
	    
    flag = 2;
    
}


if(flag == 0){
$("#formulario").submit();
}else {

var alerta = "Todos los campos son obligatorios.";

if(flag == 2){

	alerta += "\n Debe ingresar un mail valido.";
}
alert(alerta);
	
}
	
}


(function($)
		{
		    $.fn.removeStyle = function(style)
		    {
		        var search = new RegExp(style + '[^;]+;?', 'g');

		        return this.each(function()
		        {
		            $(this).attr('style', function(i, style)
		            {
		                return style.replace(search, '');
		            });
		        });
		    };
		}(jQuery));
						

						
    // HTML document is loaded. DOM is ready.
    $(function() {  

    // Parallax
        $('.intro-section').parallax({
        	imageSrc: 'img/bg-1.jpg',
        	speed: 0.2
        });
        $('.services-section').parallax({
        	imageSrc: 'img/bg-2.jpg',
        	speed: 0.2
    	});
        $('.contact-section').parallax({
        	imageSrc: 'img/bg-3.jpg',
        	speed: 0.2
        });    

        // jQuery Scroll Up / Back To Top Image
        $.scrollUp({
                scrollName: 'scrollUp',      // Element ID
		        scrollDistance: 300,         // Distance from top/bottom before showing element (px)
		        scrollFrom: 'top',           // 'top' or 'bottom'
		        scrollSpeed: 1000,            // Speed back to top (ms)
		        easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
		        animation: 'fade',           // Fade, slide, none
		        animationSpeed: 300,         // Animation speed (ms)		        
		        scrollText: '', // Text for element, can contain HTML		        
		        scrollImg: true            // Set true to use image		        
            });

        // ScrollUp Placement
        $( window ).on( 'scroll', function() {

            // If the height of the document less the height of the document is the same as the
            // distance the window has scrolled from the top...
            if ( $( document ).height() - $( window ).height() === $( window ).scrollTop() ) {

                // Adjust the scrollUp image so that it's a few pixels above the footer
                $('#scrollUp').css( 'bottom', '80px' );

            } else {      
                // Otherwise, leave set it to its default value.
                $('#scrollUp').css( 'bottom', '30px' );        
            }
        });

        $('.single-page-nav').singlePageNav({
        	offset: $('.single-page-nav').outerHeight(),
        	speed: 1500,
        	filter: ':not(.external)',
        	updateHash: true
        });

        $('.navbar-toggle').click(function(){
        	$('.single-page-nav').toggleClass('show');
        });

        $('.single-page-nav a').click(function(){
        	$('.single-page-nav').removeClass('show');
        });
        
    });
</script>
</body>
</html>