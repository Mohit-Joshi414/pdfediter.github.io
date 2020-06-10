<?php 
	include 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>support of level 4</title>
</head>
<body>
<?php 
use setasign\Fpdi\Fpdi;
require_once('fpdf181/fpdf181/fpdf.php'); 
require_once('fpdi2/fpdi2/src/autoload.php'); 

while($result = mysqli_fetch_array($querydisplay)){
	$id=$result['ID'];
	//echo $id;
if(isset($_POST[$id])){
		
    	$username=$result['username'];
    	$filename=$result['uploaded_by_level_3'];
		$fileext = explode('/', $filename);
 		$fileName=end($fileext);
 		//echo $username;
 		

 		$destinationfile = 'uploaded2/'.$fileName;
 		$currentFilePath = 'uploaded3/'.$fileName;
		//echo $destinationfile; 
		$fileMoved = rename($currentFilePath, $destinationfile);
		
$q =" UPDATE `document_of_user` SET `uploaded_by_level_2` ='$destinationfile',`uploaded_by_level_3`='' WHERE ID='$id'";

  mysqli_query($con,$q);
}

}header('Location:level_2.php');
 
