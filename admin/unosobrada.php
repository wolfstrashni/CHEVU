 <!--stranica admin/panel.php?page=2 -->
 <?php
// session_start();
if((!isset($_SESSION['status']))||($_SESSION['status']>1))
{
	header("location:login.php");
}
	
	
	if(isset($_POST['adresa']) and isset($_POST['imevlasnika']) and isset($_POST['telvlasnika']) and isset($_POST['tipobjekta']) and  isset($_POST['lokacija']) and isset($_POST['adresa']) and isset($_POST['povrsina']) and isset($_POST['sprat']) and isset($_POST['cena']) and isset($_POST['brojsoba'])){
			
			$imevlasnika=$_POST['imevlasnika'];
			$telvlasnika=$_POST['telvlasnika'];
			$tipobjekta=$_POST['tipobjekta'];
			$lokacija=$_POST['lokacija'];
			$adresa=$_POST['adresa'];
			$povrsina=$_POST['povrsina'];
			$spratnost=$_POST['spratnost'];
			$sprat=$_POST['sprat'];
			$velicinaplaca=$_POST['velicinaplaca'];
			$cena=$_POST['cena'];
			$brojsoba=$_POST['brojsoba'];
			$grejanje=$_POST['grejanje'];
			$komentar=$_POST['komentar'];
			//unos naslovne slike
		if($_FILES['naslovnaslika']['name']!="")
		{
			
			
				$naslovnaslika=time().mt_rand(3,50000);
				$ekstenzija=pathinfo($_FILES['naslovnaslika']['name'],PATHINFO_EXTENSION);
				$dauploadujem=1;
				//Provera da li je fajl slika
				$provera=getimagesize($_FILES['naslovnaslika']['tmp_name']);
				if($provera !== false){
					$dauploadujem=1;
				} 
				else
				{
					echo "Fajl nije slika!<br>";
					$dauploadujem=0;
				}
				//provera ekstenzije slike
				if($ekstenzija !="jpg" && $ekstenzija !="jpeg" && $ekstenzija !="png" && $ekstenzija !="gif" && $ekstenzija !="JPG" && $ekstenzija !="JPEG" && $ekstenzija !="PNG" && $ekstenzija !="GIF"){
					echo "Format slike je neodgovarajuci.<br>";
					$dauploadujem=0;
				}
				
				if($dauploadujem == 0)
				{
					echo "Nesto nije uredu, slika nije snimljena.<br>";
				} 
				else
				{
					if(move_uploaded_file($_FILES['naslovnaslika']['tmp_name'], "../pictures/".$naslovnaslika.".".$ekstenzija))
					{
						echo "Naslovna slika ".$naslovnaslika.".".$ekstenzija." je snimljena.<br>";
					}
					else 
					{
						echo "Dogodila se greska prilikom snimanja slike.<br>";
					}
				} 
			
		}else $naslovnaslika="";
		
		$sql="INSERT INTO nekretnina (lokacija, imevlasnika, telvlasnika, adresa, spratnost, povrsina, brojsoba, grejanje, velicinaplaca, cena, sprat, tipobjekta, naslovnaslika, dodao, komentar) VALUES ('$lokacija' , '$imevlasnika' , '$telvlasnika', '$adresa', '$spratnost', '$povrsina' ,'$brojsoba' ,'$grejanje', '$velicinaplaca', '$cena' ,'$sprat', '$tipobjekta', '$naslovnaslika', '".$_SESSION['username']."', '$komentar')";
		
		//unos vise slika nekretnine u tabelu slike
		if($_FILES['slika']['name']!="")
		{
			
			$files=array();
			$fdata=$_FILES['slika'];
			//if(is_array($fdata['name'])){
			for($i=0;$i<count($fdata['name']);++$i)
				{
					$files[]=array(
								'name'=>$fdata['name'][$i],
								'type'=>$fdata['type'][$i],
								'tmp_name'=>$fdata['tmp_name'][$i],
								'error'=> $fdata['error'][$i], 
								'size'=> $fdata['size'][$i]  
								);
				}
				foreach($files as $slika)
				{
				
					$imeslike=time().mt_rand(30,5000);
					$ekstenzija=pathinfo($slika['name'],PATHINFO_EXTENSION);
					$dauploadujem=1;
					//Provera da li je fajl slika
					if($slika['tmp_name']){
					
					$provera=getimagesize($slika['tmp_name']);
					if($provera !== false)
					{
						$dauploadujem=1;
					} 
					else
					{
						echo "Fajl nije slika!";
						$dauploadujem=0;
					}
					}
					//provera ekstenzije slike
					if($ekstenzija !="jpg" && $ekstenzija !="jpeg" && $ekstenzija !="png" && $ekstenzija !="gif" && $ekstenzija !="JPG" && $ekstenzija !="JPEG" && $ekstenzija !="PNG" && $ekstenzija !="GIF")
					{
						echo "Format slike je neodgovarajuci.<br> ";
						$dauploadujem=0;
					}
					
					if($dauploadujem == 0)
					{
						echo "Nesto nije uredu, slike nisu snimljene.<br>";
					} 
					else
					{
						if(move_uploaded_file($slika['tmp_name'], "../pictures/".$imeslike.".".$ekstenzija))
						{
							echo "<p class='obavestenje'>Slika <span style='color:red;font-weight:bold;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;'>".$slika['name']."</span> je snimljena.</p>";
						}
						else 
						{
							echo "Dogodila se greska prilikom snimanja slike.<br>";
						}
					}	
					//OVAJ DOLE ISKOMENTARISANI DEO TAKODJE PRAVI PROBLEME, A IDEJA JE DA PROCITAM ID NEKRETNINE KOJU SAM UPRAVO UNEO I ISKORISTIM GA KAO FOREIGN KEY U TABELI SLIKE, POSTO U BAZI IMAM TABELU "SLIKE" U KOJU SMESTAM IMENA SLIKA VEZANIH ZA NEKRETNINE I PRIKAZUJEM IH U GALERIJI(fajl "onekretnini.php")
					
					/*
					$sql1="SELECT id FROM nekretnine WHERE imevlasnika='$imevlasnika' AND telvlasnika='$telvlasnika' AND tipobjekta='$tipobjekta' AND lokacija='$lokacija' AND adresa='$adresa' AND povrsina='$povrsina' AND cena='$cena'";
					
					$result=mysqli_query($conn, $sql1);
					$red=mysqli_fetch_object($result);
					
					
						$sql="INSERT INTO slike (idnekretnine, autor, imeslike) VALUES ('".$red->id."','".$_SESSION['username']."', '$slika')";
					mysqli_query($conn, $sql);
					*/

					
				}	
		} else $slika="";	
	}
	
		
		mysqli_query($conn, $sql);
		if(mysqli_error($conn))
		
		echo "<p><a href='?page1' class='dugme'>Vraite&nbsp;se&nbsp;na&nbsp;stranu&nbsp;za&nbsp;unos&nbsp;nekretnina&nbsp;&nbsp;&raquo;</a></p>";
  ?>