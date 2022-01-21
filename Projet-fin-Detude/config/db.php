<?php
// Connect with the database 
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
 
if ($mysqli->connect_errno) { 
    echo "Connection to database is failed: ".$mysqli->connect_error;
    exit();
}

?>

<?php 
	 $link= mysqli_connect("localhost","root","");
     mysqli_select_db($link, "project");
     if(! $link ){
        die('Could not connect: ' . mysqli_error());
     }
 ?>
<?php
// Connect with the database 



?>

