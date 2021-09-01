<?php

// $username = "admin";
// $password = "A67kbOOXcNgIGjwZKk3g";
// $hostname = "database-1.c0gippaip5z5.us-east-1.rds.amazonaws.com"; 
// $database="medha_solve";

$username = "root";
$password = "India@1947";
$hostname = "54.175.122.1"; 
$database="solveathon";

//connection to the mysql database,
$dbhandle = mysqli_connect($hostname, $username, $password,$database )
 or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//execute the SQL Statement
$result = mysqli_query($dbhandle, "SELECT * FROM users" );

//fetch tha data from the database 
while ($row = mysqli_fetch_array($result)) {
 echo "ID:" .$row{'id'}." Name:".$row{'username'}."<br>";
}
//close the connection
mysqli_close($dbhandle);

?>