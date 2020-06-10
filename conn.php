<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_uploaded_file";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$con = mysqli_connect('localhost','root');
	 	mysqli_select_db($con,'user_uploaded_file');
		$displayquery = "SELECT * FROM document_of_user";
		$querydisplay = mysqli_query($con,$displayquery);
		
$conn->close();

?>