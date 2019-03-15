<?php
require_once("funkcije.php");
$conn=konekcija();
session_start();
if((!isset($_SESSION['status']))||($_SESSION['status']>1))
{
	session_destroy();
}
$default_page=1;
		  
		  if(isset($_GET['page'])){
			  $default_page=$_GET['page'];
		  }
		  $default_page=(isset($_GET['page']))?$_GET['page']:1;
		  $pages = array(
				"1"=>"search.php",
				"2"=>"result.php",
				"3"=>"onekretnini.php",
				"4"=>"kontakt.php",
				"5"=>"../admin/obrisan.php"
		  );
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CheVuNekretnine</title>
<link href="https://fonts.googleapis.com/css?family=Lato:300,900" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300|Open+Sans:300italic,400italic,700italic,400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">

<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">    
	/* javascript za prikaz dugmeta - povratak na vrh - u donjem desnom uglu */
	$(document).ready(function() {
		$(window).on("scroll", function() {
			var odVrha = $(window).scrollTop();
			$("#topLink").toggleClass("down", (odVrha > 300));
		});
	});
		
</script>


<script type="text/javascript">
	/* javascript za postepeni (smooth scroll) - ovaj deo koda je sa sajta css-tricks */
	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
</script>


<script>
/* javascript za dinamički prikaz navigacije (sakrivanje/prikazivanje) na mobilnim uređajima */
	
$(document).ready(function() {
		
	var respmenu 		= $('#respmenu');
	var	menu 			= $('#nav>ul');

	$(respmenu).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function(){
		var sirina = $(window).width();
		if(sirina > 768 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}	
	});
	
});	
	


</script>


<!--Ovde je style za android browser-->
<meta name="theme-color" content="#262626" />
<!--Ovde je style za microsoft mobile browser-->
<meta name="msapplication-TileColor" content="#262626">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

</head>

<body>

	<header id="header" class="negativ">
    
        <div class="wrapper">
            <a href="index.php" class="transition logo"><img src="images/logochevuround200px.png" alt="logo"></a>
            
            
            <nav id="nav">
                <ul><?php
						if($default_page=="2")
						{
							echo "<li><a href='index.php' class='transition dugme'>Pretraga</a></li>";
						}
						
						if(($default_page=="1")or($default_page=="4"))
						{
							echo "<li><a href='#drugi' class='dugme'>Novo&nbsp;u&nbsp;Ponudi</a></li>";
						}
						
                    ?>
					
                    <li><a href="#about" class="dugme">O&nbsp;Nama</a></li>
                    <?php
						if(!isset($_SESSION['status']))
						{
							
							echo "<li><a href='admin/login.php'  class='dugme transition' id='login'>Log&nbsp;In</a></li>";
						}
						else
						{	
							echo "<li><a href='admin/panel.php' class='dugme transition'>Strana&nbsp;za&nbsp;unos&nbsp;</a></li>";
							echo "<li><a href='admin/logout.php'  class='dugme transition korime' id='logout'>Log&nbsp;Out<br>".$_SESSION['username']."</a></li>";
						}
						
					?>
                </ul>
                <a href="#" id="respmenu">Prikaži/sakrij&nbsp;navigaciju</a>
            </nav>
        </div>
    </header>
	
	<section id="prvi" class="negativ">
			<div class="wrapper">
			
				<?php
				if($default_page!="4")
				{
					
				
					if(isset($pages[$default_page]))
					{
					include "module/".$pages[$default_page];
					}
				
					if($default_page=="1")
						{
							echo "<p><a href='#' class='dugme'>Prodajete&nbsp;nekretninu&nbsp;?&nbsp;&raquo;</a></p>";
						}
				}else include "module/search.php";
                    ?>
        	</div>
    </section>
			<?php
					if(($default_page=="1")or($default_page=="4"))
					{
						include "novo.php";
					}
			?>
    </section>
	
  <div id="linija">
  	
  </div>
  
    <!-- Pocetak Video Pozadine  -->
    <section id="videoback" class="negativ">
      
       <!-- Sam Video Koji Se Prikazuje Iza Sadrzaja -->
        <video autoplay loop muted poster="video/background.jpg" id="bgvid">
            <source src="video/background.webm" type="video/webm">
            <source src="video/background.mp4" type="video/mp4">
        </video>
        
       <!-- Sadrzaj Koji Ide Preko Videa -->
       <?php
					if($default_page=="4")
					{
						include "module/kontakt.php";
					}else 
						include "module/videotekst.php";
					
					
			?>
    </section>
    
    
    
    
    <?php
	include("footer.php");
	?>
    
    
    <a href="#header" id="topLink">^</a>
<script src="js/tranzicija.js"></script>
</body>



</html>




