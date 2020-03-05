<?php

	header("Content-Type: text/html;charset=utf-8");

	$CarsName=$_GET["CarsName"];

	$servername = "localhost";
	$username = "root";
	$password = "admin123";//mysql密码
	$dbname = "yiyouche";//选择数据库
	// 创建连接
	$conn = new mysqli($servername, $username, $password,$db_name);
	 
	// 使用 sql 创建数据表
	$sql1 = "CREATE TABLE yiyouche.Cars (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	cars_name VARCHAR(30),
	reg_date TIMESTAMP
	)";
 
	if ($conn->query($sql1) === TRUE) {
		echo "Table  created successfully";
	} 
	
	$sql="use yiyouche";
	
	if($conn->query($sql)==TRUE){
		$sql2 = "INSERT INTO Cars (cars_name)
		VALUES ('$CarsName')";
  
		if ($conn->query($sql2) === TRUE) {
			Header("Location: ../CarsName.html");
		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}		
	}
	
	$conn->close();
	
?>
