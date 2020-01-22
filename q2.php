<?php
$sql = "SELECT emp_last_name, graduation_percentile FROM `emp_details_table` WHERE graduation_percentile > 70";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table border=1 ><tr><th>Last Name</th><th>Graduation Percentile</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row['emp_last_name']."</td><td>".$row['graduation_percentile']."</td></tr>";
	}
	echo "</table>";
}
?>