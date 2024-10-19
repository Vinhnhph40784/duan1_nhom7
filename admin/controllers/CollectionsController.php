<?php
	include "models/CollectionsModel.php";
	class CollectionsController extends Controller{
		use CollectionsModel;
		public function index(){
			$recordPerPage = 5;
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			$data = $this->modelRead($recordPerPage);
			$this->loadView("CollectionsView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//update
		public function update(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$action = "index.php?controller=Collections&action=updatePost&id=$id";
			$record = $this->modelGetRecord($id);
			$this->loadView("CollectionsForm.php",["record"=>$record,"action"=>$action]);
		}
		//update - POST
		public function updatePost(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelUpdate($id);
			header("location:index.php?controller=Collections");
		}
		//create
		public function create(){
			$action = "index.php?controller=Collections&action=createPost";
			$this->loadView("CollectionsForm.php",["action"=>$action]);
		}
		//crete POST
		public function createPost(){
			$this->modelCreate();
		}
		//delete
		public function delete(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelDelete($id);
			header("location:index.php?controller=Collections");
		}
	}
 ?>