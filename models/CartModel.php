<?php
	trait CartModel{
		public function cartAdd($id){
		    if(!empty($_POST)) {
				$action = getPost('action');
				$id = getPost('id');
				$num = getPost('num');

				$cart = [];
				if(isset($_COOKIE['cart'])) {
					$json = $_COOKIE['cart'];
					$cart = json_decode($json, true);
				}

				switch ($action) {
					case 'add':
						$isFind = false;
						for ($i=0; $i < count($cart); $i++) {
								if($cart[$i]['id'] == $id) {
									$cart[$i]['num'] += $num;
									$isFind = true;
									break;
								}
						}

						if(!$isFind) {
							$cart[] = [
								'id'=>$id,
								'num'=>$num
							];
						}
						setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
						break;
					case 'update':
						for ($i = 0; $i < count($cart); $i++) {
							if ($cart[$i]['id'] == $id) {
								$cart[$i]['num'] = $num;
								break;
							}
						}
						setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
						break;
				}
			}
		}

		public function modelGetProducts($id){

			$conn = Connection::getInstance();
			$query = $conn->query("select * from product where id = $id");
			return $query->fetch();

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

		public function postCartCheckout(){
			$conn = Connection::getInstance();
			if (!empty($_POST)) {
				$cart = [];
				if (isset($_COOKIE['cart'])) {
					$json = $_COOKIE['cart'];
					$cart = json_decode($json, true);
				}
				if ($cart == null || count($cart) == 0) {
					header('Location: index.php');
					die();
				}
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$phone_number = $_POST['phone_number'];
				$address = $_POST['address'];
				$note = isset($_POST['note']) ? $_POST['note'] : null;


				//insert ban ghi vao orders, lay order_id vua moi insert
				$query = $conn->prepare("insert into orders set fullname=:fullname, email=:email, phone_number=:phone_number, address=:address, note=:note, order_date=now(), status='Đang chờ xác nhận'");
				$query->execute(array("fullname"=>$fullname,"email"=>$email,"phone_number"=>$phone_number,"address"=>$address,"note"=>$note));
				
				$orderId = $conn->lastInsertId();

				$cartList = $this->modelGetCart();

				foreach ($cartList as $item) {
					$num = 0;
					foreach ($cart as $value) {
						if ($value['id'] == $item->id) {
							$num = $value['num'];
							break;
						}
					}

					$query = $conn->prepare("insert into order_details set order_id=:order_id, product_id=:product_id, id_user=:id_user, num=:num, price=:price");
					$query->execute(array("order_id"=>$orderId,"product_id"=> $item->id,"id_user"=> getLoggedInUser()->id_user,"num"=>$num,"price"=>$item->price));

					echo '<script language="javascript">
							alert("Thêm đơn hàng thành công!");
							window.location.href = "index.php?controller=cart&action=history";
						</script>';
				}
				setcookie('cart', '[]', time() - 1000, '/');
			}
 
		}

		public function modelGetCartHistory(){
			$conn = Connection::getInstance();
			$userId = getLoggedInUser()->id_user;
			$query = $conn->query("SELECT * from order_details, product,orders where product.id=order_details.product_id AND order_details.id_user = '$userId' AND orders.id=order_details.order_id ORDER BY order_id DESC");
			$cartList = $query->fetchAll();
			return $cartList;
		}
	}
?>
