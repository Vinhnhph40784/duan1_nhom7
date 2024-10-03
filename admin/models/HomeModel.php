<?php
	trait HomeModel{
		//hot product
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

		public function modelFeatureUser(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from user");
			$result = $query->fetchAll();
			return $result;
		}

		public function modelFeatureOrderDetail(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from order_details");
			$result = $query->fetchAll();
			return $result;
		}

		public function modelGetListOrder(){
			$conn = Connection::getInstance();
			$page = 1;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			$limit = 10;
			$start = ($page - 1) * $limit;
			$query = $conn->query("SELECT * from orders, order_details, product
                where order_details.order_id=orders.id and product.id=order_details.product_id ORDER BY order_date DESC limit $start,$limit ");
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>
