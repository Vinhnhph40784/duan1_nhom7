<?php

function removeSpecialCharacter($str) {
	$str = str_replace('\\', '\\\\', $str);
	$str = str_replace('\'', '\\\'', $str);
	return $str;
}

function getPost($key) {
	$value = '';
	if(isset($_POST[$key])) {
		$value = $_POST[$key];
	}

	return removeSpecialCharacter($value);
}

function getGet($key) {
	$value = '';
	if(isset($_GET[$key])) {
		$value = $_GET[$key];
	}

	return removeSpecialCharacter($value);
}

function getLoggedInUser() {
	if(isset($_COOKIE['tendangnhap'])) {
		$user = $_COOKIE['tendangnhap'];
		$conn = Connection::getInstance();
		$query = $conn->query("select * from user where tendangnhap='$user'");
		return $query->fetch();
	}

	return null;
}

function getLoggedInAdmin() {
	if(isset($_COOKIE['tendangnhap_admin'])) {
		$user = $_COOKIE['tendangnhap_admin'];
		$conn = Connection::getInstance();
		$query = $conn->query("select * from user where tendangnhap='$user'");
		return $query->fetch();
	}

	return null;
} 
