<?php
    trait ContactUsModel{

    	public function modelRead($recordPerPage){

    		$page = isset($_GET["page"])&&is_numeric($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;

    		$from = $page * $recordPerPage;


    		$conn = Connection::getInstance();
    		$query = $conn->query("SELECT * FROM contact, user WHERE contact.id_user = user.id_user limit $from,$recordPerPage");

    		$result = $query->fetchAll();

    		return $result;
    	}

    	public function modelTotal(){
    		$conn = Connection::getInstance();
    		$query = $conn->query("select * from contact");
    		return $query->rowCount();
    	}

    	public function modelContact(){
    		$conn = Connection::getInstance();
    		if(isset($_POST['submit'])){
          $hovaten = $_POST['hovaten'];
          $email = $_POST['email'];
          $message_contact = $_POST['message_contact'];
          $userId = null;
          if (getLoggedInUser()) {
              $userId = getLoggedInUser()->id_user;
          }
          if(empty($hovaten) || empty($email) || empty($message_contact)) {
            echo 'Vui lòng nhập đầy đủ thông tin!';
            exit;
          } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Vui lòng nhập đúng định dạng email!';
            exit;
          }

        else{
          if(getLoggedInUser()){
            if($hovaten!="" && $email!="" &&  $message_contact!=""){
              $query = $conn->prepare("insert into contact set hoten=:hoten, email=:email, message_contact=:message_contact, id_user=:id_user, created_at=now(), updated_at=now()");
    				  $query->execute(array("hoten"=>$hovaten,"email"=> $email,"message_contact"=> $message_contact,"id_user"=>$userId));
              echo '<script>alert("Gửi liên hệ thành công.");
                window.location.href="index.php?controller=contactus&action=mailbox";
              </script>';
            }
          } else {
            if($hovaten!="" && $email!="" &&  $message_contact!=""){
              $query = $conn->prepare("insert into contact set hoten=:hoten, email=:email, message_contact=:message_contact,created_at=now(), updated_at=now()");
    				  $query->execute(array("hoten"=>$hovaten,"email"=> $email,"message_contact"=> $message_contact));
              echo '<script>alert("Gửi liên hệ thành công.");
                window.location.href="index.php?controller=contactus&action=mailbox";
                </script>';
              }
            }
          }
        }
    	}
    }
    ?>
