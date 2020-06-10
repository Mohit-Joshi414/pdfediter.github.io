<?php 
	include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Final List Display</title>
</head>
<body>
<?php 
	
while($result = mysqli_fetch_array($querydisplay)){
	$id=$result['ID'];
	//echo $id;
if(isset($_POST[$id])){

     $username=$result['username'];
    	$filename=$result['uploaded_by_level_1'];
		$fileext = explode('/', $filename);
 		$fileName=end($fileext);
 		//echo $username;
 		

 		$destinationfile = 'uploaded_final/'.$fileName;
 		$currentFilePath = 'uploaded1/'.$fileName;
		//echo $destinationfile;
		$fileMoved = rename($currentFilePath, $destinationfile);
		
$q =" UPDATE `document_of_user` SET `final_list` ='$destinationfile',`uploaded_by_level_1`='' WHERE ID='$id'";

  mysqli_query($con,$q);


}

}
header('Location:level_2.php');
 ?>
</body>
</html>