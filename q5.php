<?php
$sql = "SELECT a.emp_domain, SUM(b.emp_salary) AS salary FROM emp_code_table a, emp_salary_table b WHERE a.emp_code=b.emp_code GROUP BY a.emp_domain";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table border=1 ><tr><th>Domain</th><th>salary</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row['emp_domain']."</td><td>".$row['salary']."</td></tr>";
	}
	echo "</table>";
}
?>