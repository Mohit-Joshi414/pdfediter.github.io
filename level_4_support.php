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
		
$pdf = new FPDI();

// get the page count
$pageCount = $pdf->setSourceFile($result['document']);
// iterate through all pages
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $pdf->AddPage(0); 
    $templateId = $pdf->importPage($pageNo);
   
    $size = $pdf->getTemplateSize($templateId);

    $pdf->useTemplate($templateId);
    
    if($pageNo == $pageCount){

    $pdf->SetFont('Helvetica');
    $pdf->SetXY(65, 200);
    $pdf->Write(8, 'This is APPROVED BY Level 4 Officer.');}

}
// Output the new PDF
    $pdf->Output($result['document'],'f');
    	$username=$result['username'];
    	$filename=$result['document'];
		$fileext = explode('/', $filename);
 		$fileName=end($fileext);
 		//echo $username;
 		

 		$destinationfile = 'uploaded4/'.$fileName;
 		$currentFilePath = 'uploaded/'.$fileName;
		//echo $destinationfile;
		$fileMoved = rename($currentFilePath, $destinationfile);
		
$q =" UPDATE `document_of_user` SET `uploaded_by_level_4` ='$destinationfile',`document`='' WHERE ID='$id'";

  mysqli_query($con,$q);
}

}
 header('Location:level_4.php');
