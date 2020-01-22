<?php
$sql = "SELECT a.emp_first_name, a.emp_last_name, c.emp_domain FROM emp_code_table c INNER JOIN emp_salary_table b ON b.emp_code = c.emp_code INNER JOIN emp_details_table a ON a.emp_id=b.emp_id WHERE c.emp_domain != 'java'";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table border=1 ><tr><th>Full Name</th><th>Domain</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row['emp_first_name']." ".$row['emp_last_name']."</td><td>".$row['emp_domain']."</td></tr>";
	}
	echo "</table>";
}
?>