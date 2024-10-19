
<?php
	class Controller{
		public $view = NULL;
		public $layoutPath = NULL;
		public function loadView($fileName,$data = NULL){
			if(file_exists("views/$fileName")){
				if($data != NULL)
					extract($data);
				ob_start();
					include "views/$fileName";
					$this->view = ob_get_contents();
				ob_get_clean();
			}
			//neu gia tri cua bien $this->layoutPath khong rong thi load file nay ra
			if($this->layoutPath != NULL)
				include "views/$this->layoutPath";
			else
				echo $this->view;
		}
		//xac thuc viec dang nhap
		public function authentication(){
			if(isset($_COOKIE['tendangnhap_admin']) == false)
				header("location:index.php?controller=login");
		}
	}
 ?>
