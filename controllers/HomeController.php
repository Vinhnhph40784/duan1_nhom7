<?php
	include "models/HomeModel.php";
	class HomeController extends Controller
	{
		use HomeModel;
		public function index()
		{
			$search = isset($_GET["search"]) ? $_GET["search"] : 0;
			if ($search) {
				header("location:index.php?controller=products&action=categories&search=$search");
			}
			//load view
			$this->loadView("HomeView.php");
		}
	}
?>