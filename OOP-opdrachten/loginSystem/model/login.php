<?php


$database = new Database;
$db = $database->connect();
$table = $database->getTable();
$validate = new Validator;
$user = new User();
$errors = array();


if (isset($_POST['usernameOrEmail'])){

  $login = mysqli_real_escape_string($db, $_POST['usernameOrEmail']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($login)) { $errors['username']='please enter a username or email address'; }
  if (empty($password)) { $errors['password']='please enter a password'; }

  if (count($errors) == 0){
    $isMail = $validate->mailCheck($login);
    if ($isMail){
      $sql = $db->prepare("SELECT * FROM $table WHERE email = ? AND password = ?");
    } else {
      $sql = $db->prepare("SELECT * FROM $table WHERE username = ? AND password = ?");
    }
    $sql->bind_param("ss", $login, $password);
    $sql->execute();
    $result = $sql->get_result();

    if($result->num_rows == 0){
      $errors['login']='Something went wrong. Please check your username/email address or password.';
    } else {
      while ($row = $result->fetch_assoc()){
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setEmail($row['email']);
        $user->setPassword($row['password']);
        $user->setConnected(true);
        var_dump($user);
        $userJSON = $user->JSONize();
        echo $userJSON;
        $_SESSION["user"] = $userJSON;
        // header("location: ".BASE_URL."?action=success");
      }
    }
  }
}

require VIEW.'/login_view.php';
