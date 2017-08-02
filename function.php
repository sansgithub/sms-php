<?php

	function showDetails($std,$rollno){
		include ('dbcon.php');
		$query="SELECT * FROM 
		`student` WHERE 
		`rollno`='$rollno' 
		AND 
		`standard`='$std';";
		//echo "<pre>Debug: $query</pre>";
		
		$run=mysqli_query($conn,$query);

		if(mysqli_num_rows($run)>0){
			$data=mysqli_fetch_assoc($run); 
			?>
				<table border="1" style="width:50%; margin-top:20px;" align="center">
					<tr>
						<th colspan="3">Student Details</th>
					</tr>
					<tr>
						<td rowspan="5"><img style="max-height:120px; max-width:150px;" src="dataimg/<?php echo $data['image']; ?>"></td>
						<th>Roll No</th>
						<td><?php echo $data['rollno']; ?></td>
					</tr>
					<tr>
					<th>Name</th>
						<td><?php echo $data['name']; ?></td>
					</tr>
					<tr>
					<th>Standard</th>
						<td><?php echo $data['standard']; ?></td>
					</tr>
					<tr>
					<th>Parents Contact No</th>
						<td><?php echo $data['pcont']; ?></td>
					</tr>
					<tr>
					<th>City</th>
						<td><?php echo $data['city']; ?></td>
					</tr>
				</table>
			<?php
		}else{
			echo "<script>
			alert('No record found');
			</script>";
		}
	}