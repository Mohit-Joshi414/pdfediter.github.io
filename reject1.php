<?php 
	include 'conn.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>File Rejected</title>
</head>
<body>
	<?php
		
		while($result = mysqli_fetch_array($querydisplay)){
			$id=$result['ID'];
	 		if(isset($_POST[$id])){
	 		$sql = "DELETE FROM document_of_user WHERE id=$id";
	 		mysqli_query($con, $sql);
	 		$path=$result["uploaded_by_level_2"];
	 		unlink($path);
		}
	}
	header('Location:level_1.php');
?>
</body>
</html>