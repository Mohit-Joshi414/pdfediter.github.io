<?php 
	include 'conn.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Level-2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="border: solid;text-decoration-color: white; 
	background-color: gray ;border-width: 1px;" >
	
		<h1 style="text-align: center;">Level-3 Uploaded Files</h1>
	</div>
	<br>

	<div class="table-responsive">
		
		<table class="table table-bordered table-striped table-hover">
			
			<thead>
				<th>ID </th>
				<th>USERNAME</th>
				<th>SUBJECT</th>
				<th>VIEW</th>
				<th>ACCEPT / REJECT</th>
			</thead>
			<tbody>
				<?php 
				$i=1;
				 			while($result = mysqli_fetch_array($querydisplay)){
				 				 
				 				$id=$result['ID'];
				 						if($result['uploaded_by_level_3']!=""){//echo $id;
				 				?>

				 				<tr>
				 					<td><?php echo $i; ?> </td>
				 					<td><?php echo $result['username']; ?></td>
				 					<td><?php echo $result['subject']; ?></td>
				 					<td><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
									<script type="text/javascript">
									$(function(){
    								$('#<?php echo $id; ?>').click(function(){ 
        							if(!$('#iframe').length) {
                					$('#<?php echo $id; ?>').html('<iframe id="iframe" src="<?php echo $result['uploaded_by_level_3']; ?>" width="700" height="450"></iframe>');
                
        									}
    									});   
									});
									</script>
										<button id='<?php echo $id; ?>'  >Button</button>
									<div id="<?php echo $id; ?>"></div></td>
				 					<?php 
				 					//echo $id;
				 					?>
				 					<td><form method="post" action= "level_2_support.php" enctype="multipart/form-data">
				 					 <input type="submit" name="<?php echo $id; ?>"  value="FORWARD" />
				 					 <input type="submit" formaction="reject2.php" name="<?php echo $id?>" value="REJECT" >
				 					</form></td>

				 				</tr>
				 				<?php 
				 				$i++;
				 				}
				 			}
				?>
			</tbody>
		</table>
<div class="container" style="border: solid;text-decoration-color: white; 
	background-color: gray ;border-width: 1px;" >
	
			<h1 style="text-align: center;">Selected Participant</h1>
			<h2 style="text-align: center;">This all are selected from by the head</h2>
	</div>
	<br>

	<div class="table-responsive">
		
		<table class="table table-bordered table-striped table-hover">
			
			<thead>
				<th>ID </th>
				<th>USERNAME</th>
				<th>SUBJECT</th>
				<th>DISPLAY</th>
			</thead>
			<tbody>
				<?php 
		$con = mysqli_connect('localhost','root');
	 	mysqli_select_db($con,'user_uploaded_file');
		$displayquery = "SELECT * FROM document_of_user";
		$querydisplay = mysqli_query($con,$displayquery);
		$i=1;
						while($result = mysqli_fetch_array($querydisplay)){
				 				 
						 		$id=$result['ID'];
						 		//echo $id;
								if($result['uploaded_by_level_1']!=""){//echo $id;
				 				$filename=$result['uploaded_by_level_1'];
								$fileext = explode('/', $filename);
 								$fileName=end($fileext);

				 				?>

				 				<tr>
				 					<td><?php echo $i; ?> </td>
				 					<td><?php echo $result['username']; ?></td>
				 					<td><?php echo $result['subject']; ?></td>
				 					<td><form method="post" action= "final_list.php" enctype="multipart/form-data">
				 					 <input type="submit" name="<?php echo $id; ?>"  value="DISPLAY" />
				 					 
				 					</form></td>

				 				</tr>
				 				<?php
				 				$i++; 
				 				}
				 			}
				?>
			</tbody>
		</table>
</body>
</html>