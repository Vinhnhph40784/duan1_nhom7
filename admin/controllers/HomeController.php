<?php
include "models/HomeModel.php";
class HomeController extends Controller
{
	//Tạo - check login
	use HomeModel;
	public function __construct(){
		$this->authentication();
	}
	public function index()
	{
		$this->loadView("HomeView.php");
	}

}