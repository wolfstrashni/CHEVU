<!--stranica panel?page=3 admin/dodajkor.php-->
<?php



if((!isset($_SESSION['status']))||($_SESSION['status']>0))
{
	
	header("location:login.php");
}

?>
<h1 id="invert">Unesite novog KORISNIKA</h1>
<!-- Unos Novog Korisnika Pocinje Ovde -->
    	<section class="search-polje">
        
            
            <div class="row">
                
                <div class="polja2">
					<form action="?page=4" method="post">
					
						<input type="text" id="username" name="Username" class="username" placeholder="Unesite Korisnicko Ime:" ;/>
					
						<input type="password" id="password" name="Password" class="password" placeholder="Unesite lozinku:" ;/>
						
						<select name="status">
							<option value="1">Agent</option>
							<option value="0">Administrator</option>
						</select>
                   
                      	<button class="dugme" id="submitlog" name="btnSubmit" type="submit" value="dodajkorisnika">Dodajte novog korisnika</button>
					</form>
                </div>
            </div>
		
    	</section>
    	</div>
    </section>
  <!-- Unos Novog Korisnika se Zavrsava Ovde -->