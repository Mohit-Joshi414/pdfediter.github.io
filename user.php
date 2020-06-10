<?php 
	include 'conn.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>user select PDF</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div align="center" style="border-style: solid; margin-top: 20px;margin-left: 400px; margin-right: 350px;margin-bottom: 20px;padding-top: 20px;padding-bottom: 20px; background-color: #9e9e9e" >
	
<!-- user form.-->

	<form  method="post" action="user.php"  enctype="multipart/form-data" >
		<label>Enter your name :-</label>
		
		<input type="text" name="userName" id="userName"><br><br>
		
	<label>Enter the subject :-</label>
		<input type="text" name="subject" id="subject"><br><br>
		<label>Select a PDF document :-</label><br><br>
		<input type="file" name="file" id="file" ><br><br>
		
		<LABEL>* only PDF file is consider.</LABEL><br><br>
		<input type="submit" name="submit">

	</form>
</div>

	<?php
		
				 	if(isset($_POST['submit']))
				 	{
				 		$user_name = $_POST['userName'];
				 		
				 		//print_r($username);
				 		$subject_ = $_POST['subject'];
				 		$file_s = $_FILES['file'];
				 		$filename = $file_s['name'];
				 		$filetmp = $file_s['tmp_name'];
				 		$fileext = explode('.', $filename);
				 		$filecheck = strtolower(end($fileext));

				 		$fileextstored  = array('pdf');

				 		if(in_array($filecheck, $fileextstored)){

				 			$destinationfile = 'uploaded/'.$filename;
				 			move_uploaded_file($filetmp,$destinationfile);

	$q =" INSERT INTO `document_of_user`(`username`,`subject`, `document`) VALUES ('$user_name','$subject_','$destinationfile')";

				 			$query = mysqli_query($con,$q);
				 	}
				 }

 	?>
<div class="container" style="border: solid;text-decoration-color: white; 
	background-color: gray ;border-width: 1px;" >
	
 				<h1 style="text-align: center;">List Of All Selected Participant</h1>
			
	</div>
	<br>

	<div class="table-responsive">
		
		<table class="table table-bordered table-striped table-hover">
			
			<thead>
				<th>ID </th>
				<th>USERNAME</th>
				<th>SUBJECT</th>
			</thead>
			<tbody>
				<?php 
				$i=1;
						while($result = mysqli_fetch_array($querydisplay)){
				 				 
						 		$id=$result['ID'];
								if($result['final_list']!=""){//echo $id;
				 				$filename=$result['final_list'];
								$fileext = explode('/', $filename);
 								$fileName=end($fileext);

				 				?>

				 				<tr>
				 					<td><?php echo $i; ?> </td>
				 					<td><?php echo $result['username']; ?></td>
				 					<td><?php echo $result['subject'];?></td>
				 				</tr>
				 				<?php 
				 				$i++;
				 				}
				} 			
				?>

			</tbody>
		</table>