<?php
session_start();
require('top.inc.php');
if(!isset($_SESSION["aid"]))
{
    header("location:alogin.php");
}
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$status=mysqli_real_escape_string($con,$_GET['status']);
	mysqli_query($con,"update permit set permit_status='$status' where id='$id'");
}

$res=mysqli_query($con,"select * from permit order by from_state asc");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Permit Requests </h4>
						   
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="15%">From </th>
                                       <th width="15%">To</th>
                                       <th width="15%">From Date </th>
                                       <th width="15%">To Date</th>
                                       <th width="30%"> </th>
                                       <th width="30%"> </th>
                                       
                                    </tr>
                                 </thead>
                                  <tbody>
                                  <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['from_state']?></td>
                                       <td><?php echo $row['to_state']?></td>
                                       <td><?php echo $row['from_date']?></td>
                                       <td><?php echo $row['to_date']?></td>
                                       <td>
										   <?php
											if($row['permit_status']==1){
												echo "Applied";
											}if($row['permit_status']==2){
												echo "Approved";
											}if($row['permit_status']==3){
												echo "Rejected ";
											}
										   ?>
										 
										   <select class="btn btn-secondary dropdown-toggle" onchange="update_permit_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
											<option value="">Update Status</option>
											<option value="2" class="btn btn-success">Approved</option>
											<option value="3" class="btn btn-danger">Rejected</option>
										   </select>
										  
									   </td>
                                      
									   <td> <a href="view.php?id=<?php echo $row['id']?>&type=view&u_id=<?php echo $row['u_id']?>"  class="btn btn-primary" >View</a></td>
                                    </tr>
									<?php 
									$i++;
									} ?>
		
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>

        <script>
		 function update_permit_status(id,select_value){
			window.location.href='permit.php?id='+id+'&type=update&status='+select_value;
		 }
		 </script>


         
<?php
require('footer.inc.php');
?>