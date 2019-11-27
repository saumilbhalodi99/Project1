<?php
	session_start();
	$link=mysqli_connect("localhost","root","","saumil");

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$c_i_time = $_POST['c_i_time'];
	$c_o_time = $_POST['c_o_time'];
	$host_name = $_POST['host_name'];
	$address_visited = $_POST['address_visited'];
	$q="insert into crud (name,phone,c_i_time,c_o_time,host_name,address_visited)
	values('$name','$phone','$c_i_time','$c_o_time','$host_name','$address_visited')";
	mysqli_query($link,$q);
	$_SESSION['done'] = "Success fully inserted!";

	$ToEmail = "xyz@gmail.com";
	$ToSubject = "Subject";

	$EmailBody =   "Name : $name\n 
	Phone : $phone\n
	Check in time : $c_i_time\n
	Check out time : $c_o_time\n
	Host name: $host_name\n
	Address: $address_visited\n";

	$Message = $EmailBody;

	$headers = '';

	$headers .= "Content-type: text; charset=iso-8859-1 \r\n";
	$headers .= "From: abc@gmail.com \r\n";

	if(mail($ToEmail,$ToSubject,$Message, $headers)) {
	   $_SESSION['send'] = "Success fully sent mail!";
	} else {
	   $_SESSION['send'] = "Sorry,Don't send mail!";
	}

	header("location:index.php");