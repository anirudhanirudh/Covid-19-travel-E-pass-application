<?php
session_start();
require('top.inc.php');

if(!isset($_SESSION["aid"]))
{
    header("location:alogin.php");
}

$permit_type='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from permit_type where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$permit_type=$row['permit_type'];
}
if(isset($_POST['permit_type'])){
	$permit_type=mysqli_real_escape_string($con,$_POST['permit_type']);
	if($id>0){
		$sql="update permit_type set permit_type='$permit_type' where id='$id'";
	}else{
		$sql="insert into permit_type(permit_type) values('$permit_type')";
	}
	mysqli_query($con,$sql);
	header('location:permit_type.php');
	die();
}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">

					 
                        <div class="card-header"><strong>Permit Type</strong><small></small></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
								<label for="leave_type" class=" form-control-label">Permit Type</label>
								<input type="text" value="<?php echo $permit_type?>" name="permit_type" placeholder="Enter Permit type" class="form-control" required></div>
							   
							   <button  type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
					 
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>