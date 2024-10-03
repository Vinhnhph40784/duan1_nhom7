<?php
	class BlogController extends Controller{
		public function index(){
			$type = isset($_GET["type"])&&is_numeric($_GET["type"])?$_GET["type"]:1;
			$this->loadView("Blog".$type."View.php");
		}
	}
 ?>
