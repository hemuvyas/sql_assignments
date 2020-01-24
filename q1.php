<?php
$sql = "SELECT a.emp_first_name, b.emp_salary FROM `emp_details_table` a INNER JOIN emp_salary_table b ON a.emp_id=b.emp_id WHERE b.emp_salary > 50000";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table border=1 ><tr><th>first name</th><th>salary</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row['emp_first_name']."</td><td>".$row['emp_salary']."</td></tr>";
	}
	echo "</table>";
}
?>