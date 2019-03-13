<?php
define('ROOT', __DIR__);
define('VIEW', ROOT.'/views');
define('CONTROLLER', ROOT.'/controller');
define('MODEL', ROOT.'/model');
define('ASSETS', ROOT.'/assets');
define('BASE_URL', 'http://localhost/OOP-opdrachten/loginSystem/');

session_start();

require ASSETS.'/php/Html.php';
require ASSETS.'/php/Form.php';
require ASSETS.'/php/Validator.php';
require ASSETS.'/php/Database.php';


global $user;
global $db;
global $validate;
global $table;
$database = new Database;
$db = $database->connect("OOP_opdr");
$table = $database->getTable();
$validate = new Validator;
$user = new User($database);


if (isset($_POST['logout'])){
	session_destroy();
	unset($_SESSION['user']);
  header("location: ".BASE_URL);
}

require_once(VIEW . '/header.php');
$action = isset($_GET['action']) ? htmlentities($_GET['action']) : 'default';
$controller = '';


if (!isset($_SESSION['user'])){
	switch ($action) {
		case 'login':
			include CONTROLLER . '/LoginController.php';
			$controller = new LoginController();
			break;
		case 'registration':
			require_once(CONTROLLER . '/RegistrationController.php');
			$controller = new RegistrationController();
			break;

		default:
	    include CONTROLLER . '/LoginController.php';
	    $controller = new LoginController();
	    break;
	}
} else {
	switch ($action) {

		default:
		require_once(CONTROLLER . '/SuccessController.php');
		$controller = new SuccessController();
		break;
	}
}

// //require_once(VIEWS . '');
$controller->run($db);
require_once VIEW . '/footer.php';
?>
