<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "course";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "e124818643";

$conn = new mysqli($db_server,$db_user,$db_passwd);

//對資料庫連線
if($conn->connect_error){
	die("無法對資料庫連線");
}

//資料庫連線採UTF8

mysqli_query($conn,"SET NAMES utf8");

//選擇資料庫
mysqli_select_db($conn,$db_name);
?> 