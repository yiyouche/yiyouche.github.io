<?php

	$servername = "localhost";
	$username = "root";
	$password = "admin123";//mysql密码
	$dbname = "yiyouche";//选择数据库
 
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
 
	$sql="use yiyouche";
 
	if($conn->query($sql)==TRUE){
		$sql = "SELECT * FROM MyGuests";//sql查询语句

		$result = $conn->query($sql);//获得查询结果

		$ajax=$result->fetch_all();

		echo json_encode($ajax);
	}
 
	$conn->close();
	
?>
