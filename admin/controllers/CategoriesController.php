<?php
	//load file model
	include "models/CategoriesModel.php";
	class CategoriesController extends Controller{
		use CategoriesModel;
		public function index(){
			$recordPerPage = 5;
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			$data = $this->modelRead($recordPerPage);
			$this->loadView("CategoriesView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//update
		public function update(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$action = "index.php?controller=categories&action=updatePost&id=$id";
			$record = $this->modelGetRecord($id);
			$this->loadView("CategoriesForm.php",["record"=>$record,"action"=>$action]);
		}
		//update - POST
		public function updatePost(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelUpdate($id);
			header("location:index.php?controller=categories");
		}
		//create
		public function create(){
			$action = "index.php?controller=categories&action=createPost";
			$this->loadView("CategoriesForm.php",["action"=>$action]);
		}
		//crete POST
		public function createPost(){
			$this->modelCreate();
		}
		//delete
		public function delete(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelDelete($id);
			header("location:index.php?controller=categories");
		}
	}
 ?>
