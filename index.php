<!DOCTYPE html>
<?php
      	include 'db.php';

      	$page=(isset($_GET['page']) ? (int)$_GET['page'] : 1);
		$perpage=(isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5);
		$start=($page > 1) ? ($page * $perpage) - $perpage : 0; 

		$sql="select * from student limit ".$start." , ".$perpage." ";
		$total=$db->query("select * from student")->num_rows;
		$pages=ceil($total / $perpage);

		$rows= $db->query($sql);
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<title>Crud App</title>

	</head>
	<body>
		<div class="container">
			<div clss="row" style="margin-top: 70px;">
				<center><h1>Crud Operation System</h1></center>
					<div class="col-md-10 col-md-offset-1">
						<table class="table table-hover">
							<button type="button" name="success" data-toggle="modal" data-target="#myModal"class="btn btn-success">Add Details</button>

							<button type="button" class="btn btn-primary pull-right" onclick="print()">Print</button>

							<div id="myModal" class="modal fade" role="dialog">
  								<div class="modal-dialog">
									<!-- Modal content-->
									    <div class="modal-content">
									    	<div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal">&times;</button>
									        	<h4 class="modal-title">Add Your Details</h4>
									      	</div>
									      	<div class="modal-body">
									        	<form method="post" action="insert.php">
									        		<div class="form-group">
									        			<label>Name</label>
									        			<input type="text" required name="name" class="form-control">
									        		</div>
									        		<div class="form-group">
									        			<label>Address</label>
									        			<input type="text" required name="address" class="form-control">
									        		</div>
									        		<div class="form-group">
									        			<label for="inputClass">Class</label>
												    	<select id="inputClass" class="form-control" name="class">
												       		<option selected>BCA</option>
												        	<option>BBA</option>
												        	<option>B.Com</option>
												        	<option>Bsc.it</option>
												        	<option>MCA</option>
												        	<option>MBA</option>
												        	<option>M.Com</option>
												        	<option>Msc.it</option>
												    	</select>
									        		</div>
									        		<div class="form-group">
									        			<label>Phone</label>
									        			<input type="text" required name="phone" class="form-control">
									        		</div>
									        		<center><input type="submit" name="save" value="Submit" class="btn btn-success"></center>
									        	</form>
									      	</div>
									      	<div class="modal-footer">
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									      	</div>
									    </div>
								</div>
							</div>
							<hr><br>
  							<thead>
    							<tr>
								    <th>Id</th>
							        <th>Name</th>
							        <th>Address</th>
							        <th>Class</th>
							        <th>Phone</th>
							        <th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php while($row= $rows->fetch_assoc()): ?>
									<th><?php echo $row['id'] ?></th>
									<th><?php echo $row['name'] ?></th>
									<th><?php echo $row['address'] ?></th>
									<th><?php echo $row['class'] ?></th>
									<th><?php echo $row['phone'] ?></th>
							        <th><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a>
							        	<a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
							        </th>
							    </tr>
									<?php endwhile; ?>
							</tbody>
						</table>
						<center>
							<ul class="pagination">
								<?php for($i = 1; $i <= $pages; $i++):?>
								<li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perpage; ?>"><?php echo $i; ?></a></li>
							<?php endfor; ?>
							</ul>
						</center>
					</div>
			</div>	
		</div>
	</body>
</html>