<!--stranica admin/panel.php?page=1 -->
<?php

if((!isset($_SESSION['status']))||($_SESSION['status']>1))
{
	header("location:login.php");
}
?>
<!-- Panel za unos Pocinje Ovde -->
<h1 id="invert">Strana&nbsp;za&nbsp;unos&nbsp;novih&nbsp;nepokretnosti</h1>
    <section class="search-polje">
	
	
	
        <form action="?page=2" method="post" enctype="multipart/form-data">
            <div class="red">
					
					<div class="polja">
						<input list="imevlasnika" class="at-input" name="imevlasnika" placeholder="Unesite ime vlasnika"/>
							<datalist id="imevlasnika">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT imevlasnika FROM nekretnina WHERE obrisana=0 ORDER by imevlasnika ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->imevlasnika.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
						<input list="telvlasnika" class="at-input" name="telvlasnika" placeholder="Unesite telefon vlasnika"/>
							<datalist id="telvlasnika">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT telvlasnika FROM nekretnina WHERE obrisana=0 ORDER by telvlasnika ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->telvlasnika.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
						<input list="tipobjekta" class="at-input" name="tipobjekta" placeholder="Unesite tip objekta"/>
							<datalist id="tipobjekta">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT tipobjekta FROM nekretnina WHERE obrisana=0 ORDER by tipobjekta ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->tipobjekta.">"; 
								}
								?>
							</datalist>
                    </div>

					
					
                    <div class="polja">
						<input list="lokacija" class="at-input" name="lokacija" placeholder="Unesite Lokaciju"/>
							<datalist id="lokacija">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT lokacija FROM nekretnina WHERE obrisana=0 ORDER by lokacija ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->lokacija.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
						<input list="adresa" class="at-input" name="adresa" placeholder="Unesite adresu nekretnine"/>
							<datalist id="adresa">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT adresa FROM nekretnina WHERE obrisana=0 ORDER by adresa ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->adresa.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
                        <input list="povrsina" name="povrsina" class="at-input" placeholder="Unesite povrsinu">
							<datalist id="povrsina">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT povrsina FROM nekretnina WHERE obrisana=0 ORDER by povrsina ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->povrsina.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
						<input list="spratnost" class="at-input" name="spratnost" placeholder="Unesite spratnost objekta"/>
							<datalist id="spratnost">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT spratnost FROM nekretnina WHERE obrisana=0 ORDER by spratnost ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->spratnost.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
						<input list="sprat" class="at-input" name="sprat" placeholder="Unesite sprat"/>
							<datalist id="sprat">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT sprat FROM nekretnina WHERE obrisana=0 ORDER by sprat ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->sprat.">"; 
								}
								?>
							</datalist>
                    </div>
					
										
					<div class="polja">
						<input list="velicinaplaca" class="at-input" name="velicinaplaca" placeholder="Unesite velicinu placa u arima"/>
							<datalist id="velicinaplaca">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT velicinaplaca FROM nekretnina WHERE obrisana=0 ORDER by velicinaplaca ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->velicinaplaca.">"; 
								}
								?>
							</datalist>
                    </div>
                
						
                    <div class="polja">
                        <input list="cena" name="cena" class="at-input" placeholder="Unesite cenu">
							<datalist id="cena">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT cena FROM nekretnina WHERE obrisana=0 ORDER by cena ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->cena.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
                        <input list="brojsoba" name="brojsoba" class="at-input" placeholder="Unesite&nbsp;Broj&nbsp;Soba">
							<datalist id="brojsoba">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT brojsoba FROM nekretnina WHERE obrisana=0 ORDER by brojsoba ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->brojsoba.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
                        <input list="grejanje" name="grejanje" class="at-input" placeholder="Unesite&nbsp;Tip&nbsp;Grejanja">
							<datalist id="grejanje">
								<?php 
								$sql = mysqli_query($conn, "SELECT DISTINCT grejanje FROM nekretnina WHERE obrisana=0 ORDER by grejanje ASC");
								while($result = mysqli_fetch_object($sql)){
								echo "<option value=".$result->grejanje.">"; 
								}
								?>
							</datalist>
                    </div>
					
					<div class="polja">
							<label class="at-input">
							<input type="file" name="naslovnaslika" id="naslovnaslika" />
							<span>Naslovna slika<span>
							</label>
                    </div>
					
					<div class="polja">
							<label class="at-input">
							<input type="file" name="slika[]" id="slika" multiple="multiple"/>
							<span>Vise Slika nekretnine<span>
							</label>
                    </div>
                   
				   <div class="polja">
                        <textarea rows="5" cols="15" name="komentar"  class="at-input" placeholder="Unesite&nbsp;Tekst&nbsp;Komentara"></textarea>
                    </div>
                
                
                
                    <div class="polja">
                        <button type="submit" class="dugme" id="submit"  name="submit" >Snimite Podatke</button>
                    </div>
                
            </div>
        </form>
    </section>
  <!--Panel za unos se Zavrsava Ovde -->
 