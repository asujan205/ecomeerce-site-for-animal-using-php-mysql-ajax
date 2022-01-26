<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// sql to delete a record
if(isset($_POST['kaam'])){
$sql = "DELETE FROM animaldata WHERE Id=".$_POST['kaam'];
}
if(isset($_POST['verify'])){
$sql = "UPDATE `animaldata` SET `status` = '1' WHERE `animaldata`.`Id` = ".$_POST['verify'];	
}
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>