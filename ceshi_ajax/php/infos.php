<?php

	header("Content-Type: text/html;charset=utf-8");

	$pname=$_GET["pname"];
	$pphone=$_GET["pphone"];
	$pcar=$_GET["pcar"];
	$pcity=$_GET["pcity"];

	$servername = "localhost";
	$username = "root";
	$password = "admin123";//mysql密码
	$dbname = "yiyouche";//选择数据库
	// 创建连接
	$conn = new mysqli($servername, $username, $password,$db_name);
	 
	// 使用 sql 创建数据表
	$sql = "CREATE TABLE yiyouche.MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	pname VARCHAR(30),
	pphone VARCHAR(30),
	pcar VARCHAR(50),
	pcity VARCHAR(50),
	reg_date TIMESTAMP
	)";
 
	if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully";
	}else{
		echo "field";
	}
	
	$sql="use yiyouche";
	
	if($conn->query($sql)==TRUE){
		$sql2 = "INSERT INTO MyGuests (pname,pphone,pcar,pcity)
		VALUES ('$pname','$pphone','$pcar','$pcity')";
		  
		if ($conn->query($sql2) === TRUE) {
			echo "新记录插入成功";
		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
	}
	
	$conn->close();
	
	 Header("Location: ../Ok.html");
	
?>
