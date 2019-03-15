<!-- strana index.php?page=3  modules/onekretnini.php  -->
<style>
body{
	background:url(images/belgrade-serbia.jpg) no-repeat;}
#prvi{color:#000;
	background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(250,250,250,1) 37%);}
#prvi{text-align:unset;
	mix-blend-mode:normal;}
</style>
<?php 
		$id=$_GET['id'];
		$sql=mysqli_query($conn, "SELECT * FROM nekretnina WHERE id='$id' AND obrisana=0 LIMIT 1");
		$res=mysqli_fetch_object($sql);
		 if($res){
		

?>
		<div class="onekretnini">
			<h2><?php echo $res->tipobjekta;?></h2>
			<img class="naslovna_slika" src="pictures/<?php echo $res->naslovnaslika;?>"><img>
			<div class="podaci">
                <ul>
					<?php 
						if(isset($_SESSION['status']) and ($_SESSION['status'])<2){
							echo "<li>Ime vlasnika: ".$res->imevlasnika."</li>";
							echo "<li>Telefon vlasnika: ".$res->telvlasnika."</li>";
							echo "<li>Adresa nekretnine: ".$res->adresa."</li>";
						}
					 if(!empty($res->velicinaplaca)){echo "<li>Velicina placa:".$res->spratnost." ar</li>";} ?>
					<li>Povrsine: <?php echo $res->povrsina;?>m2</li> 
					<li>Nalazi se na lokaciji: <?php echo $res->lokacija; ?></li>
					<li>Tip grejanja: <?php echo $res->grejanje;?> grejanje </li>
					<li>Cena: <?php echo number_format($res->cena); ?> €</li>
					<?php if(!empty($res->spratnost)){echo "<li>Spratnost objekta: ".$res->spratnost." spratova</li>";}
						if(!empty($res->sprat)){echo "<li>Sprat: ".$res->sprat."</li>";}
						if(!empty($res->brojsoba)){echo "<li>Broj soba: ".$res->brojsoba."</li>";}
						if(isset($_SESSION['status']) and ($_SESSION['status']<2)){
							echo "<li>Vreme dodavanja oglasa: ".$res->vremedodavanja."</li>";
							echo "<li>Oglas dodao: ".$res->dodao."</li>";
							if(!empty($res->komentar)){ echo "<li>Komentar: ".$res->komentar."</li>";}
						}
					?>
				</ul>
				<?php
			if(isset($_SESSION['status']) and ($_SESSION['status']<1))
			{
				echo "</div><p><a href='?page=5&id=".$id."' id='logout' class='dugme obrisi'>Obrisite<br>nekretninu</a></p>";
			}else{
				echo "</div>";
			
			}
			?>
			<div id="overflow">
			</div>
			<?php
			
			
			
			?>
			<!--Pocetak light boxa sa w3c -->
	
		<div class="lightbox">
					<div class='row'>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM slike where idnekretnine='$id'");
						$i=0;
						while($result=mysqli_fetch_object($sql)){
							$i++;
							echo "
								<div class='column'>
									<img src='pictures/".$result->imeslike."' onclick='openModal();currentSlide(".$i.")' class='hover-shadow'>
								</div>";
						}
						
						?>
					</div>	

					<div id="myModal" class="modal">
						<span class="close cursor" onclick="closeModal()">&times;</span>
						<div class="modal-content">
		
							<?php
							
							
							$sql=mysqli_query($conn, "SELECT * FROM slike where idnekretnine='$id'");
							$i=0;
							$res=mysqli_fetch_object($sql);
							/*ovde pretvaram stdClass objekat u associjativni niz da bih ga prebrojao*/
							$nizobjekta=(array)$res;
							$count=count($nizobjekta);
							
							while($result=mysqli_fetch_object($sql)){
								$i++;
								echo
								"<div class='mySlides'>
									<div class='numbertext'>".$i." / ".$count."</div>
									<img src='pictures/".$result->imeslike."' style='width:100%'>
								</div>";
								
							}

							?>

							<a id="prev" class="prev" onclick="plusSlides(-1)">&#10094;</a>
							<a class="next" onclick="plusSlides(1)">&#10095;</a>

							<div class="caption-container">
							  <p id="caption"></p>
							</div>
		
							<?php
							$sql=mysqli_query($conn, "SELECT * FROM slike where idnekretnine='$id'");
							$i=0;
								while($result=mysqli_fetch_object($sql)){
									$i++;
									echo 
									"<div class='column'>
											<img class='demo' src='pictures/".$result->imeslike."' onclick='currentSlide(".$i.")' alt='Slika'>
									</div>";
								}
	} header("location:index.php?page=1")
							?>
							

							
						</div>
					</div>
			<!--Kraj light boxa sa w3c -->
        </div>
<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>