<?php
	trait AccountModel{
		public function modelRegister(){
			$conn = Connection::getInstance();
			if(isset($_POST['dangky'])) {
				$fullname= $_POST['hovaten'];
				$tendangnhap  = $_POST['tendangnhap'];
				$email = $_POST['email'];
				$diachi = $_POST['diachi'];
				$matkhau = $_POST['matkhau'];
				$dienthoai = $_POST['dienthoai'];
				$query = $conn->prepare("insert into user set fullname=:var_fullname,tendangnhap=:var_tendangnhap,email=:var_email,diachi=:var_diachi,matkhau=:var_matkhau,dienthoai=:var_dienthoai");
				$query->execute(array("var_fullname"=>$fullname,"var_tendangnhap"=>$tendangnhap,"var_email"=>$email,"var_diachi"=>$diachi,"var_matkhau"=>$matkhau,"var_dienthoai"=>$dienthoai));
				if($fullname!="" && $tendangnhap!="" && $email!="" && $diachi!="" && $dienthoai!="" && $matkhau!=""){
					echo '<script>alert("Đăng ký thành công.");
                	window.location.href="index.php?controller=account&action=login";
					</script>';
				} 
			}

		}
		public function modelLogin(){
			$tendangnhap = $_POST["tendangnhap"];
			$matkhau = $_POST["matkhau"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("SELECT * FROM user WHERE tendangnhap=:tendangnhap  AND matkhau=:var_matkhau");
			$query->execute(array("tendangnhap"=>$tendangnhap,"var_matkhau"=>$matkhau));
			if($query->rowCount() > 0){
				//---
				$record = $query->fetch();
				//---
				if ($record->role == 'admin'){
					// $_SESSION['submit'] = $tendangnhap;
					echo '<script>alert("Xin chào Admin ^^");
					window.location.href="index.php";
					</script>';
					$tendangnhap = trim(strip_tags($_POST['tendangnhap']));
					$matkhau = trim(strip_tags($_POST['matkhau']));
					setcookie("tendangnhap", $tendangnhap, time() + 30 * 24 * 60 * 60, '/');
					setcookie("matkhau", $matkhau, time() + 30 * 24 * 60 * 60, '/');

				}
				else {
					// $_SESSION['submit'] = $tendangnhap;
					echo '<script>alert("Đăng nhập thành công.");
						window.location.href="index.php";
						</script>';
					setcookie("tendangnhap", $tendangnhap, time() + 30 * 24 * 60 * 60, '/');
					setcookie("matkhau", $matkhau, time() + 30 * 24 * 60 * 60, '/');
				}
			}else {
				echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");
				window.location.href="index.php?controller=account&action=login";</script>';
			}
		}

		public function modelChangePass(){
			$conn = Connection::getInstance();
			if(isset($_POST['submit']) && $_POST["password"] != '' && $_POST["newpassword"] != '' && $_POST["renewpassword"] != ''){
				$password = $_POST['password'];
				$newpassword = $_POST['newpassword'];
				$renewpassword = $_POST['renewpassword'];

				if (isset($_COOKIE['matkhau'])) {
					if($password == $_COOKIE['matkhau']) {
						if ($newpassword != $renewpassword) {
							echo '<script language="javascript">
							alert("Mật khẩu không khớp, vui lòng nhập lại!!! ");
							window.location.href = "index.php?controller=account&action=changePass";
							</script>';
							die();
						} else {
							if (getLoggedInUser()) {
								$tendangnhap = getLoggedInUser()->tendangnhap;
								$query = $conn->prepare("UPDATE user set  matkhau=:matkhau WHERE tendangnhap = :tendangnhap");
								$query->execute(array("matkhau"=>$newpassword,"tendangnhap"=> $tendangnhap));

								echo '<script language ="javascript">
								alert("Đổi mật khẩu thành công !");
								window.location = "index.php";
								</script>';

								if (isset($_COOKIE['tendangnhap']) && ($_COOKIE['tendangnhap'])) {
									setcookie("tendangnhap", "", time() - 30 * 24 * 60 * 60, '/');
									setcookie("matkhau", "", time() - 30 * 24 * 60 * 60, '/');

									setcookie("tendangnhap", $tendangnhap, time() + 30 * 24 * 60 * 60, '/');
									setcookie("matkhau", $newpassword, time() + 30 * 24 * 60 * 60, '/');
								}
							}
						}
					} else {
						echo '<script language="javascript">
								alert("Mật khẩu bạn nhập không chính xác !!!");
								window.location.href = "index.php?controller=account&action=login";
							 </script>';
					}
				}
			}
		}
	}
 ?>
