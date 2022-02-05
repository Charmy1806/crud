<!DOCTYPE html>
<?php
      	include 'db.php';
		
		$id=(int)$_GET['id'];

		$sql="select * from student where id='$id'";

		$rows=$db->query($sql);

		$row=$rows->fetch_assoc();

		if(isset($_POST['submit']))
		{
			htmlspecialchars($name=$_POST['name']);
			htmlspecialchars($address=$_POST['address']);
			htmlspecialchars($class=$_POST['class']);
			htmlspecialchars($phone=$_POST['phone']);

			$sql2="update student set name='$name',address='$address',class='$class',phone='$phone' where id = '$id'";

			$db->query($sql2);

			header('location: index.php');
		}
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
				<center><h1> Update Crud Operation System</h1></center>
					<div class="col-md-10 col-md-offset-1">
					
							<hr><br>
									<form method="post">
									        		<div class="form-group">
									        			<label>Name</label>
									        			<input type="text" required name="name" value="<?php echo $row['name'];?>" class="form-control">
									        		</div>
									        		<div class="form-group">
									        			<label>Address</label>
									        			<input type="text" required name="address" value="<?php echo $row['address'];?>" class="form-control">
									        		</div>
									        		<div class="form-group">
									        			<label for="inputClass">Class</label>
												    	<select id="inputClass" class="form-control" value="<?php echo $row['class'];?>" name="class">
												       		<option>BCA</option>
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
									        			<input type="text" required name="phone" value="<?php echo $row['phone'];?>" class="form-control">
									        		</div>
									        		<center><input type="submit" name="submit" value="Submit" class="btn btn-success">
									        		<a href="index.php" ><input type="button" name="warning" value="Cancle" class="btn btn-warning"></a></center>
									        		

									</form>
									      	
							
  							
					</div>
			</div>	
		</div>
	</body>
</html>