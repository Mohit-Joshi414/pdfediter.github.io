<?php 
	include 'conn.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Level-4</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="border: solid;text-decoration-color: white; 
	background-color: gray ;border-width: 1px;" >
	
		<h1 style="text-align: center;">User Uploaded Files</h1>
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
				 				if($result['document']!=""){
				 						//echo $id;
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
                					$('#<?php echo $id; ?>').html('<iframe id="iframe" src="<?php echo $result['document']; ?>" width="700" height="450"></iframe>');
                
        									}
    									});   
									});
									</script>
 
									<!--<a href="#" target="_blank"></a>-->
										<button id='<?php echo $id; ?>'  >Button</button>
									<div id="<?php echo $id; ?>"></div></td>
				 					<?php 
				 					//echo $id;
				 					?>
				 					<td><form method="post" action= "level_4_support.php" enctype="multipart/form-data">
				 					 <input type="submit" name="<?php echo $id; ?>" id="<?php echo $id ;?>" value="FORWARD" />
				 					 <input type="submit" formaction="reject4.php" name="<?php echo $id ;?>"  value="REJECT" >
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
