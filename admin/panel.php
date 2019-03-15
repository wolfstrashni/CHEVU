<?php
require_once("../funkcije.php");
$conn=konekcija();

session_start();
if((!isset($_SESSION['status']))||($_SESSION['status']>1))
{
	header("location:login.php");
}
$default_page=1;
		  
		  if(isset($_GET['page'])){
			  $default_page=$_GET['page'];
		  }
		  $default_page=(isset($_GET['page']))?$_GET['page']:1;
		  $pages = array(
				"1"=>"unosforma.php",
				"2"=>"unosobrada.php",
				"3"=>"dodajkor.php",
				"4"=>"novikorisnik.php"
		  );
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CheVuNekretnine</title>
<link href="https://fonts.googleapis.com/css?family=Lato:300,900" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300|Open+Sans:300italic,400italic,700italic,400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">


<script src="../js/jquery-3.2.1.min.js"></script>


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
            <a href="../index.php" class="transition logo"><img src="../images/logochevuround200px.png" alt="logo"></a>
            
            
            <nav id="nav">
                <ul>
                    <li><a href="../index.php" class="dugme transition">Naslovna</a></li>
                    <?php if($_SESSION['status']==0){
					echo "<li><a href='?page=3' class='dugme transition'>Dodaj&nbsp;korisnika</a></li>";
					}
					?>
                    <li><a href="logout.php "class="dugme transition" id="logout"><?php echo "Log&nbsp;Out<br>".$_SESSION['username'] ;?></a></li>
                    
                </ul>
                <a href="#" id="respmenu">Prikaži/sakrij&nbsp;navigaciju</a>
            </nav>
            
            
            
        </div>
    </header>


	<section id="prvi" class="negativ">
    	<div class="wrapper">
        	
        	<?php
				
				  if(isset($pages[$default_page]))
					{
				  include $pages[$default_page];
					}
			?>
					
        </div>
    </section>
    
    
    
    
    
    
    <footer id="footer" class="negativ">
    	<p>Copyright &copy; 2107 CheVu Properties</p>
    </footer>
    
    
    <a href="#header" id="topLink">Na vrh strane
    </a>
    

<script src="../js/tranzicija.js"></script>
</body>
</html>




