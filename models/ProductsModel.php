<?php
	trait ProductsModel{
		public function modelRead(){
			$category_id = isset($_GET["category_id"])&&is_numeric($_GET["category_id"])?$_GET["category_id"]:0;
			$id_sanpham = isset($_GET["id_sanpham"])&&is_numeric($_GET["id_sanpham"])?$_GET["id_sanpham"]:0;
			$search = isset($_GET['search']) ? trim($_GET['search']) : null;
			$condition = "";
			if ($category_id) {
				$condition .= " AND id_category=$category_id";
			}
			if ($id_sanpham) {
				$condition .= " AND id_sanpham=$id_sanpham";
			}
			if ($search) {
				$condition .= " AND title like '%$search%'";
			}
			$conn = Connection::getInstance();
			$query = $conn->query("SELECT * from product where 1=1 $condition");
			$result = $query->fetchAll();

			return $result;
		}


		public function modelGetCategory($id = 0){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from category where id=$id");
			return $query->fetch();
		}


		public function modelGetCollections($id = 0){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from collections where id=$id");
			return $query->fetch();
		}


		public function modelGetRecord($id){
			$conn = Connection::getInstance();
			$query = $conn->query("select product.*, collections.name as collection_name from product, collections where product.id_sanpham = collections.id and product.id=$id");
			return $query->fetch();
		}
	}
 ?>
