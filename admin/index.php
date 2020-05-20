<?php
require('top.inc.php');
session_start();
if(!isset($_SESSION["aid"]))
{
    header("location:alogin.php");
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from state where id='$id'");
}
$res=mysqli_query($con,"select * from state order by id desc");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">State Master </h4>
						   <h4 class="box_title_link"><a href="add_state.php">Add State</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="70%">State</th>
                                       <th width="20%"></th>
                                    </tr>
                                 </thead>
                                  <tbody>
                                  <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['state']?></td>
									   <td><a href="add_state.php?id=<?php echo $row['id']?>">Edit</a> <a href="index.php?id=<?php echo $row['id']?>&type=delete">Delete</a></td>
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
         
<?php
require('footer.inc.php');
?>