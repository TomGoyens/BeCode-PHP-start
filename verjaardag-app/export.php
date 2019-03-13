<?php
if(isset($_POST['export'])){
  include 'config.php';
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=playlist.csv');
  $output = fopen("php://output", "w");
  fputcsv($output, array('Id', 'Username', 'Email', 'First artist', 'First Song', 'Second artist', 'Second Song', 'Third artist', 'Third Song', 'Registration time'));
  $query = "SELECT username, email, artist1, songTitle1, artist2, songTitle2, artist3, songTitle3, reg_date FROM $tableName ORDER BY id asc";
  $result = $conn->query($query);
  while($row = mysqli_fetch_assoc($result)){
    fputcsv($output, $row);
  }
  fclose($output);
 }

 ?>
