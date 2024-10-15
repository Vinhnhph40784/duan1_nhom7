<?php
	trait ProductsModel{
		public function modelRead($recordPerPage){
			$page = 1;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			$limit = 5;
			$start = ($page - 1) * $limit;
			$conn = Connection::getInstance();
			$query = $conn->query("SELECT product.*, category.name as category_name, collections.name as collection_name FROM product, category, collections
				where product.id_category = category.id
                AND product.id_sanpham = collections.id limit $start,$limit");
			$result = $query->fetchAll();
			return $result;
		}
		public function modelTotal(){
			$conn = Connection::getInstance();
			$query = $conn->query("select id from product");
			//ham rowCount: dem so ket qua tra ve
			return $query->rowCount();
		}
		public function modelGetRecord($id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from product where id=$id");
			return $query->fetch();
		}
		 
		public function modelUpdate($id){
			$conn = Connection::getInstance();
			$product = $this->modelGetRecord($id);
			$title = $product->title;
			$price = $product->price;
			$number = $product->number;
			$thumbnail = $product->thumbnail;
			$thumbnail_1 = $product->thumbnail_1;
			$thumbnail_2 = $product->thumbnail_2;
			$thumbnail_3 = $product->thumbnail_3;
			$thumbnail_4 = $product->thumbnail_4;
			$thumbnail_5 = $product->thumbnail_5;
			$thumbnail_in_database = $thumbnail; // Gán giá trị cũ cho biến mới
			$thumbnail_in_database = $thumbnail_1;
			$thumbnail_in_database = $thumbnail_2;
			$thumbnail_in_database = $thumbnail_3;
			$thumbnail_in_database = $thumbnail_4;
			$thumbnail_in_database = $thumbnail_5;
			$content = $product->content;
			$id_category = $product->id_category;
			$id_sanpham = $product->id_sanpham;
			$created_at = $product->created_at;
			$updated_at = $product->updated_at;
			if (!empty($_POST['title'])) {
				if (isset($_POST['title'])) {
					$title = $_POST['title'];
					$title = str_replace('"', '\\"', $title);
				}
				if (isset($_POST['price'])) {
					$price = $_POST['price'];
					$price = str_replace('"', '\\"', $price);
				}
				if (isset($_POST['number'])) {
					$number = $_POST['number'];
					$number = str_replace('"', '\\"', $number);
				}

				if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
					// Dữ liệu gửi lên server không bằng phương thức post
					echo "Phải Post dữ liệu";
					die;
				}

				// Kiểm tra có dữ liệu thumbnail trong $_FILES không
				if (isset($_FILES["thumbnail"])) {
					if ($_FILES["thumbnail"]['error'] == 0 && $_FILES["thumbnail"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir    = "../assets/images/uploads/";
						$target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);
						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
						$maxfilesize   = 800000;
						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
							if ($check !== false) {
								echo "Đây là file ảnh - " . $check["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload
						if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						// Xử lý di chuyển file tạm ra thư mục cần lưu trữ
						if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
							$thumbnail = $target_file;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				} else {
					$thumbnail = $thumbnail_in_database;
				}
				if (isset($_FILES["thumbnail_1"])) {
					if ($_FILES["thumbnail_1"]['error'] == 0 && $_FILES["thumbnail_1"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_1    = "../assets/images/uploads/";
						$target_file_1   = $target_dir_1 . basename($_FILES["thumbnail_1"]["name"]);
						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_1, PATHINFO_EXTENSION);
						$maxfilesize   = 800000;
						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check_1 = getimagesize($_FILES["thumbnail_1"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload
						if ($_FILES["thumbnail_1"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}
						if (move_uploaded_file($_FILES["thumbnail_1"]["tmp_name"], $target_file_1)) {
							$thumbnail_1 = $target_file_1;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				} else {
					$thumbnail_1 = $thumbnail_in_database;
				}

				if (isset($_FILES["thumbnail_2"])) {
					if ($_FILES["thumbnail_2"]['error'] == 0 && $_FILES["thumbnail_2"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_2    = "../assets/images/uploads/";
						$target_file_2   = $target_dir_2 . basename($_FILES["thumbnail_2"]["name"]);
						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_2 = pathinfo($target_file_2, PATHINFO_EXTENSION);
						$maxfilesize   = 800000;
						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check_2 = getimagesize($_FILES["thumbnail_2"]["tmp_name"]);
							if ($check_2 !== false) {
								echo "Đây là file ảnh - " . $check_2["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload
						if ($_FILES["thumbnail_2"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_2, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}
						if (move_uploaded_file($_FILES["thumbnail_2"]["tmp_name"], $target_file_2)) {
							$thumbnail_2 = $target_file_2;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				} else {
					$thumbnail_2 = $thumbnail_in_database;
				}


				if (isset($_FILES["thumbnail_3"])) {
					if ($_FILES["thumbnail_3"]['error'] == 0 && $_FILES["thumbnail_3"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_3    = "../assets/images/uploads/";
						$target_file_3   = $target_dir_3 . basename($_FILES["thumbnail_3"]["name"]);
						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_3, PATHINFO_EXTENSION);
						$maxfilesize   = 800000;
						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check_1 = getimagesize($_FILES["thumbnail_3"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload
						if ($_FILES["thumbnail_3"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						if (move_uploaded_file($_FILES["thumbnail_3"]["tmp_name"], $target_file_3)) {
							$thumbnail_3 = $target_file_3;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				} else {
					$thumbnail_3 = $thumbnail_in_database;
				}

				if (isset($_FILES["thumbnail_4"])) {
					if ($_FILES["thumbnail_4"]['error'] == 0 && $_FILES["thumbnail_4"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_4    = "../assets/images/uploads/";
						$target_file_4   = $target_dir_4 . basename($_FILES["thumbnail_4"]["name"]);
						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_4, PATHINFO_EXTENSION);
						$maxfilesize   = 800000;

						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check_1 = getimagesize($_FILES["thumbnail_4"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload
						if ($_FILES["thumbnail_4"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						if (move_uploaded_file($_FILES["thumbnail_4"]["tmp_name"], $target_file_4)) {
							$thumbnail_4 = $target_file_4;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				} else {
					$thumbnail_4 = $thumbnail_in_database;
				}

				if (isset($_FILES["thumbnail_5"])) {
					if ($_FILES["thumbnail_5"]['error'] == 0 && $_FILES["thumbnail_5"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_5    = "../assets/images/uploads/";
						$target_file_5   = $target_dir_5 . basename($_FILES["thumbnail_5"]["name"]);
						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_5, PATHINFO_EXTENSION);
						$maxfilesize   = 800000;
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check_1 = getimagesize($_FILES["thumbnail_5"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload
						if ($_FILES["thumbnail_5"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						if (move_uploaded_file($_FILES["thumbnail_5"]["tmp_name"], $target_file_5)) {
							$thumbnail_5 = $target_file_5;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				} else {
					$thumbnail_5 = $thumbnail_in_database;
				}

				if (isset($_POST['content'])) {
					$content = $_POST['content'];
					$content = str_replace('"', '\\"', $content);
				}
				if (isset($_POST['id_category'])) {
					$id_category = $_POST['id_category'];
					$id_category = str_replace('"', '\\"', $id_category);
				}
				if (isset($_POST['id_sanpham'])) {
					$id_sanpham = $_POST['id_sanpham'];
					$id_sanpham = str_replace('"', '\\"', $id_sanpham);
				}
				$created_at = $updated_at = date('Y-m-d H:s:i');
				// Lưu vào DB

				// Sửa danh mục
				$thumbnail = substr($thumbnail,17, -1) . 'g';
				$thumbnail_1 = substr($thumbnail_1,17, -1) . 'g';
				$thumbnail_2 = substr($thumbnail_2,17, -1) . 'g';
				$thumbnail_3 = substr($thumbnail_3,17, -1) . 'g';
				$thumbnail_4 = substr($thumbnail_4,17, -1) . 'g';
				$thumbnail_5 = substr($thumbnail_5,17, -1) . 'g';
				$sql = 'update product set title="' . $title . '",price="' . $price . '",number="' . $number . '",thumbnail="' . $thumbnail . '",thumbnail_1="' . $thumbnail_1 . '",thumbnail_2="' . $thumbnail_2 . '",thumbnail_3="' . $thumbnail_3 . '",thumbnail_4="' . $thumbnail_4 . '",thumbnail_5="' . $thumbnail_5 . '",content="' . $content . '",id_category="' . $id_category . '",id_sanpham="' . $id_sanpham . '", updated_at="' . $updated_at . '" where id=' . $id;
				$query = $conn->prepare($sql);
				$query->execute();
			}
		}
		public function modelCreate(){
			$conn = Connection::getInstance();
			if (!empty($_POST['title'])) {
				if (isset($_POST['title'])) {
					$title = $_POST['title'];
					$title = str_replace('"', '\\"', $title);
				}
				if (isset($_POST['price'])) {
					$price = $_POST['price'];
					$price = str_replace('"', '\\"', $price);
				}
				if (isset($_POST['number'])) {
					$number = $_POST['number'];
					$number = str_replace('"', '\\"', $number);
				}

				if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
					// Dữ liệu gửi lên server không bằng phương thức post
					echo "Phải Post dữ liệu";
					die;
				}

				// Kiểm tra có dữ liệu thumbnail trong $_FILES không
				if (isset($_FILES["thumbnail"])) {
					if ($_FILES["thumbnail"]['error'] == 0 && $_FILES["thumbnail"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir    = "../assets/images/uploads/";
						$target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);
						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
						$maxfilesize   = 800000;
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
							if ($check !== false) {
								echo "Đây là file ảnh - " . $check["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload
						if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
							$thumbnail = $target_file;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				}
				if (isset($_FILES["thumbnail_1"])) {
					if ($_FILES["thumbnail_1"]['error'] == 0 && $_FILES["thumbnail_1"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_1    = "../assets/images/uploads/";
						$target_file_1   = $target_dir_1 . basename($_FILES["thumbnail_1"]["name"]);

						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_1, PATHINFO_EXTENSION);

						// Cỡ lớn nhất được upload (bytes)
						$maxfilesize   = 800000;

						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							$check_1 = getimagesize($_FILES["thumbnail_1"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						if ($_FILES["thumbnail_1"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}
						
						if (move_uploaded_file($_FILES["thumbnail_1"]["tmp_name"], $target_file_1)) {
							$thumbnail_1 = $target_file_1;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				}

				// Kiểm tra có dữ liệu thumbnail_2 trong $_FILES không
				if (isset($_FILES["thumbnail_2"])) {
					if ($_FILES["thumbnail_2"]['error'] == 0 && $_FILES["thumbnail_2"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_2    = "../assets/images/uploads/";
						//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
						$target_file_2   = $target_dir_2 . basename($_FILES["thumbnail_2"]["name"]);

						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_2 = pathinfo($target_file_2, PATHINFO_EXTENSION);

						// Cỡ lớn nhất được upload (bytes)
						$maxfilesize   = 800000;

						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							//Kiểm tra xem có phải là ảnh bằng hàm getimagesize
							$check_2 = getimagesize($_FILES["thumbnail_2"]["tmp_name"]);
							if ($check_2 !== false) {
								echo "Đây là file ảnh - " . $check_2["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
						if ($_FILES["thumbnail_2"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_2, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						// Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
						if (move_uploaded_file($_FILES["thumbnail_2"]["tmp_name"], $target_file_2)) {
							$thumbnail_2 = $target_file_2;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				}

				// Kiểm tra có dữ liệu thumbnail_3 trong $_FILES không
				if (isset($_FILES["thumbnail_3"])) {
					if ($_FILES["thumbnail_3"]['error'] == 0 && $_FILES["thumbnail_3"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_3    = "../assets/images/uploads/";
						//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
						$target_file_3   = $target_dir_3 . basename($_FILES["thumbnail_3"]["name"]);

						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_3, PATHINFO_EXTENSION);

						// Cỡ lớn nhất được upload (bytes)
						$maxfilesize   = 800000;

						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							//Kiểm tra xem có phải là ảnh bằng hàm getimagesize
							$check_1 = getimagesize($_FILES["thumbnail_3"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
						if ($_FILES["thumbnail_3"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						// Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
						if (move_uploaded_file($_FILES["thumbnail_3"]["tmp_name"], $target_file_3)) {
							$thumbnail_3 = $target_file_3;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				}

				// Kiểm tra có dữ liệu thumbnail_4 trong $_FILES không
				if (isset($_FILES["thumbnail_4"])) {
					if ($_FILES["thumbnail_4"]['error'] == 0 && $_FILES["thumbnail_4"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_4    = "../assets/images/uploads/";
						//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
						$target_file_4   = $target_dir_4 . basename($_FILES["thumbnail_4"]["name"]);

						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_4, PATHINFO_EXTENSION);

						// Cỡ lớn nhất được upload (bytes)
						$maxfilesize   = 800000;

						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							//Kiểm tra xem có phải là ảnh bằng hàm getimagesize
							$check_1 = getimagesize($_FILES["thumbnail_4"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
						if ($_FILES["thumbnail_4"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						// Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
						if (move_uploaded_file($_FILES["thumbnail_4"]["tmp_name"], $target_file_4)) {
							$thumbnail_4 = $target_file_4;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				}

				// Kiểm tra có dữ liệu thumbnail_5 trong $_FILES không
				if (isset($_FILES["thumbnail_5"])) {
					if ($_FILES["thumbnail_5"]['error'] == 0 && $_FILES["thumbnail_5"]["size"] > 0) {

						//Thư mục bạn sẽ lưu file upload
						$target_dir_5    = "../assets/images/uploads/";
						//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
						$target_file_5   = $target_dir_5 . basename($_FILES["thumbnail_5"]["name"]);

						//Lấy phần mở rộng của file (jpg, png, ...)
						$imageFileType_1 = pathinfo($target_file_5, PATHINFO_EXTENSION);

						// Cỡ lớn nhất được upload (bytes)
						$maxfilesize   = 800000;

						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

						if (isset($_POST["submit"])) {
							//Kiểm tra xem có phải là ảnh bằng hàm getimagesize
							$check_1 = getimagesize($_FILES["thumbnail_5"]["tmp_name"]);
							if ($check_1 !== false) {
								echo "Đây là file ảnh - " . $check_1["mime"] . ".";
							} else {
								echo "Không phải file ảnh.";
								die;
							}
						}

						// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
						if ($_FILES["thumbnail_5"]["size"] > $maxfilesize) {
							echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
							die;
						}

						// Kiểm tra kiểu file
						if (!in_array($imageFileType_1, $allowtypes)) {
							echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
							die;
						}

						// Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
						if (move_uploaded_file($_FILES["thumbnail_5"]["tmp_name"], $target_file_5)) {
							$thumbnail_5 = $target_file_5;
						} else {
							echo "Có lỗi xảy ra khi upload file.";
							die;
						}
					}
				}

				if (isset($_POST['content'])) {
					$content = $_POST['content'];
					$content = str_replace('"', '\\"', $content);
				}
				if (isset($_POST['id_category'])) {
					$id_category = $_POST['id_category'];
					$id_category = str_replace('"', '\\"', $id_category);
				}
				if (isset($_POST['id_sanpham'])) {
					$id_sanpham = $_POST['id_sanpham'];
					$id_sanpham = str_replace('"', '\\"', $id_sanpham);
				}
				$created_at = $updated_at = date('Y-m-d H:s:i');
				// Thêm danh mục
				$thumbnail = substr($thumbnail,17, -1) . 'g';
				$thumbnail_1 = substr($thumbnail_1,17, -1) . 'g';
				$thumbnail_2 = substr($thumbnail_2,17, -1) . 'g';
				$thumbnail_3 = substr($thumbnail_3,17, -1) . 'g';
				$thumbnail_4 = substr($thumbnail_4,17, -1) . 'g';
				$thumbnail_5 = substr($thumbnail_5,17, -1) . 'g';
				$sql = 'insert into product(title, price, number, thumbnail, thumbnail_1, thumbnail_2, thumbnail_3, thumbnail_4, thumbnail_5, content, id_category, id_sanpham, created_at, updated_at)
				values ("' . $title . '","' . $price . '","' . $number . '","' . $thumbnail . '","' . $thumbnail_1 . '","' . $thumbnail_2 . '","' . $thumbnail_3 . '","' . $thumbnail_4 . '","' . $thumbnail_5 . '","' . $content . '","' . $id_category . '","' . $id_sanpham . '","' . $created_at . '","' . $updated_at . '")';
				$query = $conn->prepare($sql);
				$query->execute();
			}
		}
		//xoa ban ghi
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$conn->query("delete from product where id=$id");
		}
		public function modelGetCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from category");
			$result = $query->fetchAll();
			return $result;
		}
		public function modelListCategoriesSub($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id,name from categories where parent_id = $id order by id desc");
			//tra ve mot ban ghi
			return $query->fetchAll();
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

		public function modelFeatureCollection(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from collections");
			$result = $query->fetchAll();
			return $result;
		}

	}
 ?>
