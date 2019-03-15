<!-- strana login?page=2  admin/logincheck.php  -->
<?php

require_once("../funkcije.php");
$conn=konekcija();
if(!isset($_POST['Username'])||!isset($_POST['Password'])){
	die("Unesite Korisnicko ime i lozinku");
}
$username=$_POST['Username'];
$password=$_POST['Password'];
$username=str_replace("'","",$username);
$username=str_replace("-","",$username);
$username=str_replace("<","",$username);
$username=str_replace(">","",$username);
$password=str_replace("'","",$password);
$password=str_replace("-","",$password);
$password=str_replace("<","",$password);
$password=str_replace(">","",$password);



mysqli_errno($conn);
$sql="SELECT * from korisnici where username= '$username' and password = '$password' limit 1";


$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_object($result);
if($user)
	{
	$_SESSION['status'] = $user->status;
	$_SESSION['username'] = $user->username;
	header("location:panel.php");
	}
	else {
		echo "<h3 class='warning' id='invert'>Nije&nbsp;dobro&nbsp;korisnicko&nbsp;ime&nbsp;ili&nbsp;lozinka&nbsp;</h3><p><a href='?page=1' class='dugme'>Pokusajte&nbsp;ponovo&nbsp;?&nbsp;&raquo;</a></p>";
	}

//print_r($user);