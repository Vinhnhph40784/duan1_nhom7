<?php
include "models/HomeModel.php";
class HomeController extends Controller
{
	//Tạo - check login
	use HomeModel;

	public function index()
	{
		$this->loadView("HomeView.php");
	}
}