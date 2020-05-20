<?php
session_start();
require('top.inc.php');
if(!isset($_SESSION["id"]))
{
    header("location:login.php");
}
//
$res=mysqli_query($con,"select * from permit order by from_state asc");
?>

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">E-Pass Status </h4>
						  
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                    <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="20%">From </th>
                                       <th width="20%">From Date </th>
                                       <th width="20%">Status </th>
                                       <th width="20%"> </th>
                                       <th width="10%"> </th>
                                       
                                    </tr>
                                 </thead>
                                  <tbody>
                                  <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){
                           if($row['u_id']==$_SESSION["id"]){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['from_state']?></td>
                                       <td><?php echo $row['from_date']?></td>
                                       <td>	   <?php
											if($row['permit_status']==1){
												echo "Applied";
											}if($row['permit_status']==2){
												echo "Approved";
											}if($row['permit_status']==3){
												echo "Rejected ";
											}
										   ?>
                                 
                                 </td>
                                       
                                 <td>	   <?php
											if($row['permit_status']==1){ ?>
												<button type="button" class="btn btn-warning">Applied E-Pass</button>
										<?php	}if($row['permit_status']==2){?>
												<a href="view_epass.php?id=<?php echo $row['id']?>&type=view_epass"  class="btn btn-success" >View/save Epass</a>
										<?php 	}if($row['permit_status']==3){?>
												<button type="button" class="btn btn-danger">Permit Rejected</button>
										<?php	}
										   ?>
                                 
                                 </td> 
												 
                                    </tr>
									<?php 
									$i++;} }?>
                           
		
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>




         
<?php
require('footer.inc.php');
?>