<section id="drugi">
<div class="wrapper">
        
            <h2>Proverite šta je novo u našoj ponudi!</h2>
            
            <p>Izdvojili smo za Vas sveže nepokretnosti. Klikćite!. Ne propustite taze unete podatke. </p>
				
				<?php
					$sql=mysqli_query($conn, "SELECT * FROM nekretnina WHERE obrisana=0 ORDER BY vremedodavanja DESC LIMIT 3" );
				
				
					while($res = mysqli_fetch_object($sql)){
				?>
			<article class="tri">
            <a href="<?php echo "?page=3&id=".$res->id; ?>">
                <img src="<?php	echo "pictures/thumbnails/".$res->naslovnaslika; ?>" alt="Slika"/>
                
				<div class="triTekst" id="rezultat">
                	<h2><?php echo $res->tipobjekta;?></h2>
                	<p>Povrsine: <?php echo $res->povrsina;?>m2, <br/>nalazi se na lokaciji <?php echo $res->lokacija; ?>,<br/>sa <?php echo $res->grejanje;?> grejanjem i <br/>cenom od:<?php echo $res->cena; ?> €</p>
                </div>
            </a>
            </article>
            <?php
					}
			?>
        </div>
</section>