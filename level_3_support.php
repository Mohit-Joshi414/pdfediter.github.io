<?php 
	include 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Level 3 support</title>
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

$pdf = new FPDI();

// get the page count
$pageCount = $pdf->setSourceFile($result['uploaded_by_level_4']);
// iterate through all pages
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $pdf->AddPage(0); 
    $templateId = $pdf->importPage($pageNo);
   
    $size = $pdf->getTemplateSize($templateId);

    $pdf->useTemplate($templateId);
    
    if($pageNo == $pageCount){

    $pdf->SetFont('Helvetica');
    $pdf->SetXY(65, 215);
    $pdf->Write(8, 'This is APPROVED BY Level 3 Officer.');}

}
// Output the new PDF
    $pdf->Output($result['uploaded_by_level_4'],'f');
    $username=$result['username'];
    	$filename=$result['uploaded_by_level_4'];
		$fileext = explode('/', $filename);
 		$fileName=end($fileext);
 		//echo $username;
 		

 		$destinationfile = 'uploaded3/'.$fileName;
 		$currentFilePath = 'uploaded4/'.$fileName;
		//echo $destinationfile;
		$fileMoved = rename($currentFilePath, $destinationfile);
		
$q =" UPDATE `document_of_user` SET `uploaded_by_level_3` ='$destinationfile',`uploaded_by_level_4`='' WHERE ID='$id'";

  mysqli_query($con,$q);

}

}
header('Location:level_3.php');
 ?>
</body>
</html>