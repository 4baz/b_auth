<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbName = "cauth_dev";

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
$totalusers = null;
$totalonline = null;

$connection = mysqli_connect($servername, $username, $password, 
                                                 $dbName);

    $query = "SELECT * FROM c_program_users";
    $result = mysqli_query($connection, $query);

if ($result)
    {
        // it return number of rows in the table.
        $row = mysqli_num_rows($result);
          
           if ($row)
              {
               //  printf("Number of users : " . $row);
                 $totalusers = $row;
               //  echo "<br>";
              }
        // close the result.
        mysqli_free_result($result);
    }
 

    $query2 = "SELECT * FROM c_program_sessions WHERE c_logged_in=1";
    $result2 = mysqli_query($connection, $query2);  
    
    if ($result2)
    {
        // it return number of rows in the table.
        $row = mysqli_num_rows($result2);
          
           if ($row)
              {
               //  printf("Number of Online users : " . $row);
                 $totalonline = $row;

              }
        // close the result.
        mysqli_free_result($result2);
    }else{
                         printf("failed");

    }
    
  
    // Connection close 
    mysqli_close($connection);
?>