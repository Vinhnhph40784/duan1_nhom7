<?php
	trait HomeModel{
		public function modelHotProducts(){
			$conn = Connection::getInstance();
			$query = $conn->query("SELECT * from product, order_details where order_details.product_id=product.id order by order_details.num DESC limit 6");
			$result = $query->fetchAll();
			return $result;
		}

		public function modelFeatureProducts(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from product");
			$result = $query->fetchAll();
			return $result;
		}

		public function modelGetCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from category");
			$result = $query->fetchAll();
			return $result;
		}
		public function modelGetProducts($category_id){
			$conn = Connection::getInstance();$check = "";
			$query = $conn->query("select * from product where id_category =$category_id order by id desc");
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>
