<?php

	header("Content-Type: text/html;charset=utf-8");

	$pname=$_GET["pname"];
	$pphone=$_GET["pphone"];

	$servername = "localhost";
	$username = "root";
	$password = "root";//mysql密码
	$dbname = "genghe";//选择数据库
	// 创建连接
	$conn = new mysqli($servername, $username, $password,$dbname);
	 
	// 使用 sql 创建数据表
	$sql = "CREATE TABLE MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	pname VARCHAR(30) NOT NULL,
	pphone VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP 
	)";
 
	if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully";
	}
	
	$sql="use genghe";
	
	if($conn->query($sql)==TRUE){
		$sql2 = "INSERT INTO MyGuests (pname,pphone)
		VALUES ('$pname','$pphone')";
		  
		if ($conn->query($sql2) === TRUE) {
			echo "新记录插入成功";
		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
	}
	
	$conn->close();
	
	Header("Location: Ok.html");
	
?>
