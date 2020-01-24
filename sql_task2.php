<?php
include 'connection.php';
$sql1 = "SELECT * FROM `emp_code_table`";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM `emp_salary_table`";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "SELECT * FROM `emp_details_table`";
$result3 = mysqli_query($conn, $sql3);
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sql.css">
	<title>SQL ASSIGNMENT 2</title>
</head>
<body>
	<main>
		<div class="table">
			<table border=1>
				<tr><th colspan="3">Employee_code_table</th></tr>
				<tr><td>employee_code</td><td>employee_code_name</td><td>employee_domain</td></tr>
				<?php
					while($row = mysqli_fetch_assoc($result1)) {
						echo "<tr><td>".$row['emp_code']."</td><td>".$row['emp_code_name']."</td><td>".$row['emp_domain']."</td></tr>";
					}
				?>
			</table>
		</div>
		<div class="table">
			<table border="1">
				<tr><th colspan="3">Employee_salary_table</th></tr>
				<tr><td>employee_id</td><td>employee_salary</td><td>employee_code</td></tr>
				<?php
					while($row = mysqli_fetch_assoc($result2)) {
						echo "<tr><td>".$row['emp_id']."</td><td>".$row['emp_salary']."</td><td>".$row['emp_code']."</td></tr>";
					}
				?>
			</table>
		</div>
		<div class="table">
			<table border="1">
				<tr><th colspan="4">Employee_details_table</th></tr>
				<tr><td>employee_id</td><td>employee_first_name</td><td>employee_last_name</td><td>Graduation_percentile</td></tr>
				<?php
					while($row = mysqli_fetch_assoc($result3)) {
						echo "<tr><td>".$row['emp_id']."</td><td>".$row['emp_first_name']."</td><td>".$row['emp_last_name']."</td><td>".$row['graduation_percentile']."</td></tr>";
					}
				?>
			</table>
		</div>
		<div class='queryform'>
			<form action="sql_task2.php" method="post">
				1. WAQ to list all employee first name with salary greater than 50k.
				<input class="btn" type="submit" name="submit" value="q1"><br>
				2. WAQ to list all employee last name with graduation percentile greater than 70%
				<input class="btn" type="submit" name="submit" value="q2"><br>
				3. WAQ to list all employee code name with graduation percentile less than 70%.
				<input class="btn" type="submit" name="submit" value="q3"><br>
				4. WAQ to list all employee’s full name that are not of domain Java.
				<input class="btn" type="submit" name="submit" value="q4"><br>
				5. WAQ to list all employee_domain with sum of it's salary.
				<input class="btn" type="submit" name="submit" value="q5"><br>
				6. Write the above query again but dont include salaries which is less than 30k.
				<input class="btn" type="submit" name="submit" value="q6"><br>
				7. WAQ to list all employee id which has not been assigned employee code.
				<input class="btn" type="submit" name="submit" value="q7"><br>
			</form>
		</div>
	</main>
		
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$param=$_POST['submit'];
	if($param=='q1'){
		$sql = "SELECT a.emp_first_name, b.emp_salary FROM `emp_details_table` a INNER JOIN emp_salary_table b ON a.emp_id=b.emp_id WHERE b.emp_salary > 50000";
		$result=mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border=1 ><tr><th>first name</th><th>salary</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row['emp_first_name']."</td><td>".$row['emp_salary']."</td></tr>";
			}
			echo "</table>";
		}
	}
	elseif ($param=='q2') {
		$sql = "SELECT emp_last_name, graduation_percentile FROM `emp_details_table` WHERE graduation_percentile > 70";
		$result=mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border=1 ><tr><th>Last Name</th><th>Graduation Percentile</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row['emp_last_name']."</td><td>".$row['graduation_percentile']."</td></tr>";
			}
			echo "</table>";
		}
	}
	elseif ($param=='q3') {
		$sql = "SELECT b.emp_code, a.graduation_percentile FROM `emp_details_table` a INNER JOIN emp_salary_table b ON a.emp_id=b.emp_id WHERE a.graduation_percentile < 70";
		$result=mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border=1 ><tr><th>Employee Code</th><th>Graduation Percentile</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row['emp_code']."</td><td>".$row['graduation_percentile']."</td></tr>";
			}
			echo "</table>";
		}
	}
	elseif ($param=='q4') {
		$sql = "SELECT a.emp_first_name, a.emp_last_name, c.emp_domain FROM emp_code_table c INNER JOIN emp_salary_table b ON b.emp_code = c.emp_code INNER JOIN emp_details_table a ON a.emp_id=b.emp_id WHERE c.emp_domain != 'java'";
		$result=mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border=1 ><tr><th>Full Name</th><th>Domain</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row['emp_first_name']." ".$row['emp_last_name']."</td><td>".$row['emp_domain']."</td></tr>";
			}
			echo "</table>";
		}
	}
	elseif ($param=='q5') {
		$sql = "SELECT a.emp_domain, SUM(b.emp_salary) AS salary FROM emp_code_table a, emp_salary_table b WHERE a.emp_code=b.emp_code GROUP BY a.emp_domain";
		$result=mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border=1 ><tr><th>Domain</th><th>salary</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row['emp_domain']."</td><td>".$row['salary']."</td></tr>";
			}
			echo "</table>";
		}
	}
	elseif ($param=='q6') {
		$sql = "SELECT a.emp_domain, SUM(b.emp_salary) AS salary FROM emp_code_table a, emp_salary_table b WHERE a.emp_code=b.emp_code AND b.emp_salary > 30000 GROUP BY a.emp_domain";
		$result=mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border=1 ><tr><th>Domain</th><th>salary</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row['emp_domain']."</td><td>".$row['salary']."</td></tr>";
			}
			echo "</table>";
		}
	}
	elseif ($param=='q7') {
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
	}
	else{
		echo "Enter Query in correct format";
	}
}
?>