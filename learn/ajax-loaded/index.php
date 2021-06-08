<?php 
include('header.php');
include_once("db_connect.php");
?>
<title>phpzag.com : Demo Ajax Loaded Bootstrap Modal with PHP & MySQL </title>
<script type="text/javascript" src="script/ajaxData.js"></script>
<?php include('container.php');?>

<div class="container">
	<h2>Example: Ajax Loaded Bootstrap Modal with PHP & MySQL </h2>
	
	<table class="table table-striped table-bordered">              
	<thead>
	<tr>
	<th>Employee Name</th>
	<th>Detail</th>
	</tr>
	</thead>              
	<tbody>           
	<?php
	$sql = "SELECT id, employee_name, employee_salary, employee_age FROM employee LIMIT 5";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	while( $rows = mysqli_fetch_assoc($resultset) ) { 
	?>
	<tr>
	<td><?php echo $rows["employee_name"]; ?></td>
	<td><button data-toggle="modal" data-target="#emp-modal" data-id="<?php echo $rows["id"]; ?>" id="getEmployee" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button></td>
	</tr>
	<?php
	}
	?>
	</tbody>
	</table>
	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/ajax-loaded-bootstrap-modal-with-php-mysql" title="">Back to Tutorial</a>			
	</div>		
</div>


<div id="emp-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog"> 
      <div class="modal-content">                  
         <div class="modal-header"> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">*</button> 
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i> Employee Details
             </h4> 
         </div>          
         <div class="modal-body">                       
             <div id="employee_data-loader" style="display: none; text-align: center;">
                 <img src="ajax-loader.gif"> 
             </div>                       
             <div id="employee-detail">                                        
                 <div class="row"> 
                     <div class="col-md-12">                         
                     <div class="table-responsive">                             
                     <table class="table table-striped table-bordered">
                     <tr>
                     <th>EmpID</th>
                     <td id="empid"></td>
                     </tr>                                     
                     <tr>
                     <th>Name</th>
                     <td id="emp_name"></td>
                     </tr>                                         
                     <tr>
                     <th>Age</th>
                     <td id="emp_age"></td>
                     </tr>                                         
                     <tr>
                     <th>Salary</th>
                     <td id="emp_salary"></td>
                     </tr>                                                                                                
                     </table>                                
                     </div>                                       
                   </div> 
              </div>                       
             </div>                              
         </div>           
       <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
       </div>              
      </div> 
   </div>
</div>

<?php include('footer.php');?>