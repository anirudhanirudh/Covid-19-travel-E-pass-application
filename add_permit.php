<?php
session_start();
require('top.inc.php');
if(!isset($_SESSION["id"]))
{
    header("location:login.php");
}

$name=$_SESSION["name"];
    $email=$_SESSION["email"];
    $aadhar=$_SESSION["aadhar"];
    $phone=$_SESSION["phone"];

if(isset($_POST['submit'])){
    
	$permit_id=mysqli_real_escape_string($con,$_POST['permit_id']);
	$from_state=mysqli_real_escape_string($con,$_POST['from_state']);
    $to_state=mysqli_real_escape_string($con,$_POST['to_state']);
    $from_date=mysqli_real_escape_string($con,$_POST['from_date']);
	$to_date=mysqli_real_escape_string($con,$_POST['to_date']);
	$u_id=$_SESSION["id"];
    $permit_desc=mysqli_real_escape_string($con,$_POST['permit_desc']);
   
    $permit_status=mysqli_real_escape_string($con,$_POST['permit_status']);
    $sql="insert into permit(u_id,permit_id,from_state,to_state,from_date,to_date,permit_desc,permit_status) 
    values('$u_id','$permit_id','$from_state','$to_state','$from_date','$to_date','$permit_desc',1)";
	mysqli_query($con,$sql);
	header('location:index.php');
	
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>E-Pass Request</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
						   <div class="form-group">
									<label class=" form-control-label">Name</label>
									<input type="text" value="<?php echo $name?>" name="name"  class="form-control" required>
								</div>
                                <div class="form-group">
									<label class=" form-control-label">Email</label>
									<input type="email" value="<?php echo $email?>" name="email"  class="form-control" required>
								</div>
                                <div class="form-group">
									<label class=" form-control-label">Aadhar</label>
									<input type="text" value="<?php echo $aadhar?>" name="aadhar"  class="form-control" required>
								</div>
                                <div class="form-group">
									<label class=" form-control-label">Contact Number</label>
									<input type="text" value="<?php echo $phone?>" name="phone"  class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Permit Type</label>
									<select name="permit_id" required class="form-control">
										<option value="">Select Permit</option>
										<?php
										$res=mysqli_query($con,"select * from permit_type order by permit_type desc");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['permit_type']."</option>";
										}
										?>
									</select>
								</div>
                                <div class="form-group">
                                <label class=" form-control-label">From State</label>
									<select name="from_state" required class="form-control">
										<option value="">Select state</option>
										<?php
										$res=mysqli_query($con,"select * from state order by state desc");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['state'].">".$row['state']."</option>";
										}
										?>
									</select>
								</div>
                                <div class="form-group">
								<label class=" form-control-label">To State</label>
									<select name="to_state" required class="form-control">
										<option value="">Select state</option>
										<?php
										$res=mysqli_query($con,"select * from state order by state desc");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['state'].">".$row['state']."</option>";
										}
										?>
									</select>
								</div>
							   <div class="form-group">
									<label class=" form-control-label">From Date</label>
									<input type="date" name="from_date"  class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">To Date</label>
									<input type="date" name="to_date" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Permit Description</label>
									<input type="text" name="permit_desc" class="form-control" >
								</div>
								
								 <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
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