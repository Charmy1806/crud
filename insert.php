<?php
	include 'db.php';

	if(isset($_POST['save']))
	{
		htmlspecialchars($name =$_POST['name']);
		htmlspecialchars($address=$_POST['address']);
		htmlspecialchars($class=$_POST['class']);
		htmlspecialchars($phone=$_POST['phone']);

		$sql ="insert into student(name,address,class,phone) values ('$name','$address','$class','$phone')";

		$val=$db->query($sql);

		if($val)
		{
			header('location: index.php');
		};
	}
?>