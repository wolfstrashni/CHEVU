<?php


if((!isset($_SESSION['status']))||($_SESSION['status']>1))
{
	header("location:login.php");
}
$conn=konekcija();
$id=$_GET['id'];
$sql="UPDATE nekretnina SET obrisana=1 WHERE id='$id'";

$q=mysqli_query($conn, $sql);

echo "<p class='obavestenje'>Nekretnina je uspesno obrisana</p>";
?>	
