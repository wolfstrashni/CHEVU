<?php
function konekcija()
{
	$conn=mysqli_connect("localhost", "nekretnine", "nekretnine", "nekretnine");
	if(!$conn) return false;
	mysqli_query($conn,"SET NAMES UTF8");
	return $conn;
}
?>