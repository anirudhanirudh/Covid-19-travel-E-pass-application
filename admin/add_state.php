<?php
session_start();
require('top.inc.php');

if(!isset($_SESSION["aid"]))
{
    header("location:alogin.php");
}

$state='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from state where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$state=$row['state'];
}
if(isset($_POST['state'])){
	$state=mysqli_real_escape_string($con,$_POST['state']);
	if($id>0){
		$sql="update state set state='$state' where id='$id'";
	}else{
		$sql="insert into state(state) values('$state')";
	}
	mysqli_query($con,$sql);
	header('location:index.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add</strong><small> State</small></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
								<label for="state" class=" form-control-label">state Name</label>
								<input type="text" value="<?php echo $state?>" name="state" placeholder="Enter state name" class="form-control" required></div>
							   
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