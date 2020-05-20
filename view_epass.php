<?php
session_start();
require('db.php');
if(!isset($_SESSION["id"]))
{
    header("location:login.php");
}
if(isset($_GET['type']) && $_GET['type']=='view_epass' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from permit where id='$id'");
}
$row=mysqli_fetch_assoc($res);
?>

<?php
header('content-type:image/jpeg');
$font="BRUSHSCI.TTF";
$image=imagecreatefromjpeg("epass.jpg");
$color=imagecolorallocate($image,19,21,22); 
$name=$_SESSION['name'];
imagettftext($image,50,0,265,220,$color,$font,$name);
$date=$row['from_date'];
imagettftext($image,20,0,450,395,$color,"AGENCYR.TTF",$date);
$state1=$row['from_state'];
imagettftext($image,20,0,450,495,$color,"AGENCYR.TTF",$state1);
$state=$row['to_state'];
imagettftext($image,20,0,450,595,$color,"AGENCYR.TTF",$state);
$file=time().'_'.$row['id'];
imagejpeg($image,"epass/".$file.".jpg");
imagedestroy($image);

?>

<?php
require('footer.inc.php');
?>