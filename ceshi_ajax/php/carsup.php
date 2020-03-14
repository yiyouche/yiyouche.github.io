<?php

	$id=$_GET['id'];
    $name=$_GET['name'];

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

    $conn->query($sql);
    
    $sql1 = "UPDATE Cars SET cars_name='$name' WHERE id='$id'";
 
	if($conn->query($sql1)==TRUE){
		$sql2 = "SELECT * FROM Cars";//sql查询语句

		$result = $conn->query($sql2);//获得查询结果

		$ajax=$result->fetch_all();

        echo json_encode($ajax);
	}
 
    $conn->close();
    
    Header("Location: ../Carsinfo.html");
	
?>
