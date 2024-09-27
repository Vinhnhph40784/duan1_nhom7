<?php
	include "models/ContactUsModel.php";
	class ContactUsController extends Controller{
		use ContactUsModel;

		public function index(){
			$this->loadView("ContactUsView.php");
		}

		public function contactPost(){
			$this->modelContact();
		}

		public function mailbox(){
			$recordPerPage = 5;
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			$data = $this->modelRead($recordPerPage);
			$this->loadView("MailboxView.php",["data"=>$data,"numPage"=>$numPage]);
		}
	}
 ?>