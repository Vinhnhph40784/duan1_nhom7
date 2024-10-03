<?php
	include "models/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		public function __construct(){
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();
		}
		//them san pham vao gio hang
		public function create(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham cartAdd de them san pham vao gio hang
			$this->cartAdd($id);
			header("location:index.php?controller=cart");
		}
		//hien thi gio hang
		public function index(){
			$this->loadView("CartView.php");
		}

		//xoa san pham khoi gio hang
		public function delete(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$cart = [];
			if(isset($_COOKIE['cart'])) {
				$json = $_COOKIE['cart'];
				$cart = json_decode($json, true);
			}
			for ($i=0; $i < count($cart); $i++) {
				if($cart[$i]['id'] == $id) {
					array_splice($cart, $i, 1);
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function postCheckout(){
			$this->postCartCheckout();
			echo '<script language="javascript">
				alert("Thêm đơn hàng thành công!");
				window.location.href = "index.php?controller=cart&action=history";
			</script>';
		}
		//cap nhat nhieu san pham
		public function update(){
			$id = isset($_POST["id"]) ? $_POST["id"] : 0;
			$num = isset($_POST["num"]) ? $_POST["num"] : 0;
			$cart = [];
			if(isset($_COOKIE['cart'])) {
				$json = $_COOKIE['cart'];
				$cart = json_decode($json, true);
			}
			for ($i = 0; $i < count($cart); $i++) {
				if ($cart[$i]['id'] == $id) {
					$cart[$i]['num'] = $num; // Cập nhật số lượng mới
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		//thanh toan gio hang

		public function checkout(){
			$this->loadView("CheckoutView.php");
		}

		public function history(){
			$this->loadView("CartHistoryView.php");
		}
	}
 ?>
