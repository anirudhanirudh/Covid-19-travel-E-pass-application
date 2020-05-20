<?php
session_start();
require('top.inc.php');
if(!isset($_SESSION["id"]))
{
    header("location:login.php");
}

$res=mysqli_query($con,"select * from permit order by from_state asc");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">E-Pass Request </h4>
						   <h4 class="box_title_link"><a href="add_permit.php">Add Request</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                    <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="20%">From </th>
                                       <th width="20%">To</th>
                                       <th width="20%">From Date </th>
                                       <th width="20%">To Date</th>
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
                                       <td><?php echo $row['to_state']?></td>
                                       <td><?php echo $row['from_date']?></td>
                                       <td><?php echo $row['to_date']?></td>
                                       
									   <td> <a href="view.php?id=<?php echo $row['id']?>&type=view"  class="btn btn-primary" >View</a></td>
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