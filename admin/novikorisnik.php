<!--stranica panel?page=4 admin/novikorisnik.php-->
<?php

require_once("../funkcije.php");
$conn=konekcija();


if((!isset($_SESSION['status']))||($_SESSION['status']>0))
{
	header("location:login.php");
}

if(($_POST['Username']=="")||($_POST['Password']==""))
	{
	 die("Unesite Korisnicko Ime i Lozinku"); 
	
	}
	
	$username=$_POST['Username'];
	$password=$_POST['Password'];
	$status=$_POST['status'];
	
	
	$sql="INSERT INTO korisnici(username, password, status) VALUES ('$username','$password','$status')";
	if(mysqli_query($conn, $sql)!= false)
	{
		if($status="0"){
			$status="Administrator";
		}
		$status="Agent";
		echo "<p class='obavestenje'>Uspesno dodat korisnik: <b style='color:red'>".$username." - ".$status."<b></p>";
	} 
	else echo "<p>Nesto je krenulo po zlu, korisnik nije dodat! <br> <p>Greska broj ".mysqli_errno()."</p>";
	
?>