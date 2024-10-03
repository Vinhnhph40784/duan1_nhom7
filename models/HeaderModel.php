<?php
	trait HeaderModel{
		public function modelGetCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from category order by id desc");
			$result = $query->fetchAll();
			return $result;
		}

		public function modelGetCollections(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from collections");
			$result = $query->fetchAll();
			return $result;
		}

		public function modelGetCart(){
			$conn = Connection::getInstance();
			$cart = [];
			if (isset($_COOKIE['cart'])) {
				$json = $_COOKIE['cart'];
				$cart = json_decode($json, true);
			}
			$idList = [];
			foreach ($cart as $item) {
				$idList[] = $item['id'];
			}
			if (count($idList) > 0) {
				$idList = implode(',', $idList); // chuyeern
				//[2, 5, 6] => 2,5,6

				$query = $conn->query("select * from product where id in ($idList)");
				$cartList = $query->fetchAll();
			} else {
				$cartList = [];
			}
			return $cartList;
		}
	}
 ?>
