<!-- strana index.php?page=1  module/search.php  -->

<!-- Search Pocinje Ovde -->
<h1 id="invert">Pronadjite svoj <strong>DOM</strong></h1>

    <section class="search-polje">
        <form method="get" action=""  >
            <div class="red">
			
					<div class="polja">
                        <select name="tipobjekta">
                            <option selected="" value="">Objekat</option>
                            <?php 
							$sql = mysqli_query($conn, "SELECT DISTINCT tipobjekta FROM nekretnina WHERE obrisana=0 ORDER by tipobjekta ASC");
							while($result = mysqli_fetch_object($sql)){
							echo "<option value=".$result->tipobjekta.">".$result->tipobjekta."</option>"; 
							}
							?>
                            
                        </select>
                    </div>
					
					
                    <div class="polja">
                        <select name="lokacija">
                            <option selected="" value="">Lokacija</option>
                            <?php 
							$sql = mysqli_query($conn, "SELECT DISTINCT lokacija FROM nekretnina WHERE obrisana=0 ORDER by lokacija ASC");
							while($result = mysqli_fetch_object($sql)){
							echo "<option value=".$result->lokacija.">".$result->lokacija."</option>"; 
							}
							?>
                        </select>
                    </div>
                
                
                    
                
                
                    <div class="polja">
                        <input class="at-input" type="text" name="mincena" placeholder="Cena Min" value="">
                    </div>
                
                
                    <div class="polja">
                        <input class="at-input" type="text" name="maxcena" placeholder="Cena Max" value="">
                    </div>
                
            
                
                    <div class="polja">
                        <select name="brojsoba">
                            <option selected="" value="">Broj&nbsp;Soba</option>
                            <?php 
							$sql = mysqli_query($conn, "SELECT DISTINCT brojsoba FROM nekretnina WHERE obrisana=0 ORDER by brojsoba ASC");
							while($result = mysqli_fetch_object($sql)){
							echo "<option value=".$result->brojsoba.">".$result->brojsoba."</option>"; 
							}
							?>
                        </select>
                    </div>
                
                
                    <div class="polja">
                        <select name="grejanje">
                            <option selected="" value="">Tip&nbsp;Grejanja</option>
                            <?php 
							$sql = mysqli_query($conn, "SELECT DISTINCT grejanje FROM nekretnina WHERE obrisana=0 ORDER by grejanje ASC");
							while($result = mysqli_fetch_object($sql)){
							echo "<option value=".$result->grejanje.">".$result->grejanje."</option>"; 
							}
							?>
                        </select>
                    </div>

						<div class="polja">
							<select name="povrsina">
								<option selected="" value="">Kvadratura</option>
								<?php 
							$sql = mysqli_query($conn, "SELECT DISTINCT povrsina FROM nekretnina WHERE obrisana=0 ORDER by povrsina ASC");
							while($result = mysqli_fetch_object($sql)){
							echo "<option value=".$result->povrsina.">".$result->povrsina."</option>"; 
							}
							?>
							</select>
						</div>

                    <div class="polja">
						<input type="hidden" name="page" value="2" />
                        <input class="dugme" id="submit" value="Trazi" type="submit">
                    </div>
                
            </div>
        </form>
    </section>
  <!--Search se Zavrsava Ovde -->