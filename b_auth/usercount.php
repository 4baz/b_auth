<?php
$servername = "127.0.0.1";
$username = "";
$password = "";
$dbName = "";

// Create connection
//$conn = new mysqli($servername, $username, $password,$dbName);

// Check connection
//if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";

//$sql = "SELECT COUNT(*) FROM c_program_users";

//$usercount = $conn->exec('SELECT COUNT(*) FROM c_program_users');
//$conn->exec($sql);
//echo $sql;

//$conn->query($sql);
//$sql = "SELECT COUNT(*) FROM `c_program_sessions` WHERE `c_logged_in`=1";


//echo $sql;
$totalusers = 0;
$totalonline= 0;



require 'functions/includes.php';



$test =  get_connection();


 $allUsersQuery = $test->query('SELECT * FROM c_program_users');

 $usersRows = $allUsersQuery->fetch_all(1);
foreach($usersRows as $row){
      $totalusers++;
 }


$allOnlineUsersQuery = $test->query('SELECT * FROM `c_program_sessions` WHERE `c_logged_in`=1');

 $OnlineusersRows = $allOnlineUsersQuery->fetch_all(1);
foreach($OnlineusersRows as $row){
      $totalonline++;
 }





   ?>
