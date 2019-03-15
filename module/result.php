<!-- strana index.php?page=2 module/result.php  -->
<style>
body{
	background:url(images/belgrade-serbia.jpg) no-repeat;
}

 #prvi {
	text-align:center;
	color:#262626;
	background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(250,250,250,1) 58%); 
	
}

#prvi{
		
		mix-blend-mode:normal;
}
#invert{
	margin-bottom:200px;
}
</style>
<div>
<h1 id="invert"><strong>REZULTAT</strong> pretrage</h1>
			<?php
			
				if(isset($_GET['tipobjekta'])){
					$tipobjekta=$_GET['tipobjekta'];
				}else echo "";
				
				if(isset($_GET['lokacija'])){
					$lokacija=$_GET['lokacija'];
				}else echo "";

				if((($_GET['mincena'])!="")&&(is_numeric($_GET['mincena'])))
				{
					$mincena = $_GET['mincena'];
				}
				else $mincena = 0;
					
				if((($_GET['maxcena'])!="")&&(is_numeric($_GET['maxcena'])))
				{
					$maxcena = $_GET['maxcena'];
				}
				else $maxcena = 1985803942;
					
				if(isset($_GET['brojsoba'])){
					$brojsoba=$_GET['brojsoba'];
				}else echo "";
				if(isset($_GET['grejanje'])){
					$grejanje=$_GET['grejanje'];
				}else echo "";
				if(isset($_GET['povrsina'])){
					$povrsina=$_GET['povrsina'];
				}else echo "";
				
				$sql = mysqli_query($conn, "SELECT * FROM nekretnina WHERE tipobjekta LIKE '%$tipobjekta%' AND lokacija LIKE '%$lokacija%' AND cena BETWEEN '$mincena' AND '$maxcena' AND brojsoba LIKE '%$brojsoba%' AND grejanje LIKE '%$grejanje%' AND povrsina LIKE '%$povrsina%' AND obrisana=0");
				
				while($res = mysqli_fetch_object($sql)){
			?>
			<article class="tri">
            <a href="<?php echo "?page=3&id=".$res->id; ?>">
                <img src="<?php	echo "pictures/".$res->naslovnaslika; ?>" alt="Slika"/>
                
				<div class="triTekst" id="rezultat">
                	<h2><?php echo $res->tipobjekta;?></h2>
                	<p>Povrsine: <?php echo $res->povrsina;?>m2, <br/>nalazi se na lokaciji <?php echo $res->lokacija; ?>,<br/>sa <?php echo $res->grejanje;?> grejanjem i <br/>cenom od:<?php echo number_format($res->cena); ?> €</p>
                </div>
            </a>
            </article>
			<?php
				}
			?>
</div>