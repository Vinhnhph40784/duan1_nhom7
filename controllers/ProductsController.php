<?php
	include "models/ProductsModel.php";
	class ProductsController extends Controller{
		use ProductsModel;
		public function categories(){
			$data = $this->modelRead();
			$this->loadView("ProductsCategoriesView.php",["data"=>$data]);
		}
		public function collection(){
			$data = $this->modelRead();
			$this->loadView("ProductsCollectionView.php",["data"=>$data]);
		}
		//chi tiet san pham
		public function detail(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$record = $this->modelGetRecord($id);
			if (!$record) {
			header("location:index.php");
			}
			$this->loadView("ProductsDetailView.php",["product"=>$record]);
		}
		//danh gia so sao
		public function rating(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$star = isset($_GET["star"]) ? $_GET["star"] : 0;
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into rating set product_id=:var_product_id, star=:var_star");
			$query->execute(array("var_product_id"=>$id,"var_star"=>$star));
			header("location:index.php?controller=products&action=detail&id=$id");
		}
		//lay so sao tuong ung voi id truyen vao
		public function getStar($id,$star){
			$conn = Connection::getInstance();
			$query = $conn->query("select id from rating where product_id=$id and star=$star");
			return $query->rowCount();
		}
		public function ajax(){
			//lay bien key truyen tu url
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where name like '%$key%'");
			$result = $query->fetchAll();
			$strResult = "";
			foreach($result as $rows)
				$strResult = $strResult."<li><img src='assets/upload/products/{$rows->photo}'><a href='index.php?controller=products&action=detail&id={$rows->id}'>{$rows->name}</a></li>";
			echo $strResult;
		} 
	}
 ?>
