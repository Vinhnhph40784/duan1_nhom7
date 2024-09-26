<?php
	session_start();
	include "../application/Connection.php";
	include "../application/Controller.php";
	include "../helper/helper.php";

 ?>
 <?php
 	$controller = isset($_GET["controller"]) ? $_GET["controller"]:"Home";
 	$action = isset($_GET["action"]) ? $_GET["action"]:"index";
 	$fileController = "controllers/$controller"."Controller.php";
 	$classController = "$controller"."Controller";
 	//kiem tra xem file vat ly co ton tai khong, neu co thi load no
 	if(file_exists($fileController)){
 		include $fileController;
 		//khoi tao object
 		$obj = new $classController();
 		$obj->$action();
 	}
  ?>
