<?php
	trait LoginModel{
		public function modelLogin(){
			$conn = Connection::getInstance();
			if(isset($_POST['submit'])){
				$tendangnhap_admin = $_POST['tendangnhap_admin'];
				$matkhau_admin = $_POST['matkhau_admin'];
				$query = $conn->prepare("SELECT * FROM user WHERE tendangnhap=:tendangnhap  AND matkhau=:var_matkhau LIMIT 1");
				$query->execute(array("tendangnhap"=>$tendangnhap_admin,"var_matkhau"=>$matkhau_admin));

				if($query->rowCount() > 0){
					$user = $query->fetch();

					if ($user->role == 'admin'){
						// $_SESSION['submit'] = $tendangnhap;
						echo '<script>alert("Welcome Admin !!!");
						window.location.href="index.php";
						</script>';
						$tendangnhap_admin = trim(strip_tags($_POST['tendangnhap_admin']));
						$matkhau_admin = trim(strip_tags($_POST['matkhau_admin']));
						session_start();
						setcookie("tendangnhap_admin", $tendangnhap_admin, time() + 30 * 24 * 60 * 60, '/');
						setcookie("matkhau_admin", $matkhau_admin, time() + 30 * 24 * 60 * 60, '/');

					}
					else {
					  '<script>alert("Tài khoản hoặc Mật khẩu của Admin không đúng,vui lòng nhập lại.");
					  window.location.href="index.php?controller=login";</script>';
					}

				}
				else{
					echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");
					window.location.href="index.php?controller=login";
					</script>';
				}
			}
		}
	}
 ?>
