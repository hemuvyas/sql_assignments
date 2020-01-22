<?php
$host="localhost";
$user="root";
$pass="";
$db="sql2";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
		1. WAQ to list all employee first name with salary greater than 50k.
		<button id="q1">Show Answer</button><br>
		<span class="a1"></span><br>
		2. WAQ to list all employee last name with graduation percentile greater than 70%
		<button id="q2">Show Answer</button><br>
		<span class="a2"></span><br>
		3. WAQ to list all employee code name with graduation percentile less than 70%.
		<button id="q3">Show Answer</button><br>
		<span class="a3"></span><br>
		4. WAQ to list all employee’s full name that are not of domain Java.
		<button id="q4">Show Answer</button><br>
		<span class="a4"></span><br>
		5. WAQ to list all employee_domain with sum of it's salary.
		<button id="q5">Show Answer</button><br>
		<span class="a5"></span><br>
		6. Write the above query again but dont include salaries which is less than 30k.
		<button id="q6">Show Answer</button><br>
		<span class="a6"></span><br>
		7. WAQ to list all employee id which has not been assigned employee code.
		<button id="q7">Show Answer</button><br>
		<span class="a7"></span><br>
	</main>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#q1').click(function(){
				$('.a1').html('<?php include('q1.php'); ?>');
			});
			$('#q2').click(function(){
				$('.a2').html('<?php include('q2.php'); ?>');
			});
			$('#q3').click(function(){
				$('.a3').html('<?php include('q3.php'); ?>');
			});
			$('#q4').click(function(){
				$('.a4').html('<?php include('q4.php'); ?>');
			});
			$('#q5').click(function(){
				$('.a5').html('<?php include('q5.php'); ?>');
			});
			$('#q6').click(function(){
				$('.a6').html('<?php include('q6.php'); ?>');
			});
			$('#q7').click(function(){
				$('.a7').html('<?php include('q7.php'); ?>');
			});
		});
	</script>
</body>
</html>