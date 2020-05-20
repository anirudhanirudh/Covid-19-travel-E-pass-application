<?php
session_start();
require('top.inc.php');
if(!isset($_SESSION["aid"]))
{
    header("location:alogin.php");
}

if(isset($_GET['type']) && $_GET['type']=='view' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from permit where id='$id'");
}

if(isset($_GET['type']) && $_GET['type']=='view' && isset($_GET['u_id'])){
	$u_id=mysqli_real_escape_string($con,$_GET['u_id']);
	$res1=mysqli_query($con,"select * from users where id='$u_id'");
}
$row=mysqli_fetch_assoc($res);
$row1=mysqli_fetch_assoc($res1);
?>

<div class="card text-center">
  <div class="card-header">
  <?php echo "User  :".$row1['name'] ?>
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
    <a href="permit.php" class="btn btn-primary">Close</a>
  </div>
  <div class="card-footer text-muted">
 <h4> <?php
         
       
 
       ?></h4>
  </div>
</div>

<?php
require('footer.inc.php');
?>