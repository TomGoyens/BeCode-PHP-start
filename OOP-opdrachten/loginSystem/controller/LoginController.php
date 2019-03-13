<?php
class LoginController {

	public function __construct(){
	}
	public function run($db){
		include MODEL . '/login.php';
	}
}
?>
