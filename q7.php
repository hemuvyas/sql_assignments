<?php
$sql = "SELECT emp_id, emp_code FROM `emp_salary_table` WHERE emp_code IS NULL";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table border=1 ><tr><th>ID</th><th>CODE</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row['emp_first_name']."</td><td>".$row['emp_salary']."</td></tr>";
	}
	echo "</table>";
}
else{
	echo "Result is not available";
}
?>