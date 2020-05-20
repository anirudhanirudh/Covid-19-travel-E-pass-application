<?php
session_start();
require('top.inc.php');
if(!isset($_SESSION["id"]))
{
    header("location:login.php");
}
if(isset($_GET['type']) && $_GET['type']=='view' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from permit where id='$id'");
}
$row=mysqli_fetch_assoc($res);
?>

<div class="card text-center">
  <div class="card-header">
  <?php echo "User  :".$_SESSION["name"] ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">
    <p> <?php echo "From :  " .$row['from_state'] ?></p><br>
     <p><?php echo "To  :  ".$row["to_state"] ?></p><br>
     <p> <?php echo "From Date :  " .$row['from_date'] ?></p><br>
     <p><?php echo "To Date  :  ".$row["to_date"] ?></p><br>
     </h5>
    <p class="card-text"><?php
         
        echo $row['permit_desc']

      ?></p>
    <a href="index.php" class="btn btn-primary">close</a>
  </div>
  <div class="card-footer text-muted">
 <h4> <?php
         
        
 
       ?></h4>
  </div>
</div>

<?php
require('footer.inc.php');
?>