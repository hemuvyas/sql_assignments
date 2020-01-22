<?php
$sql = "SELECT b.emp_code, a.graduation_percentile FROM `emp_details_table` a INNER JOIN emp_salary_table b ON a.emp_id=b.emp_id WHERE a.graduation_percentile < 70";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table border=1 ><tr><th>Employee Code</th><th>Graduation Percentile</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row['emp_code']."</td><td>".$row['graduation_percentile']."</td></tr>";
	}
	echo "</table>";
}
?>