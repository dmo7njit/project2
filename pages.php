<?php

	class women{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM salaries
				LEFT JOIN employees ON salaries.emp_no=employees.emp_no ORDER BY salary DESC LIMIT 10;');

			echo "<h2> Colleges with the highest percentage of female students </h2>";
			echo "<table>";
			echo "<tr><td><b> Institution </b></td><td><b> Percentage of Female Students </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}

	}

	class men{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM salaries
				LEFT JOIN employees ON salaries.emp_no=employees.emp_no WHERE salaries.from_date>=\'1981-01-01\' AND 
				salaries.to_date<=\'1985-12-31\' ORDER BY salaries.salary DESC LIMIT 10;');

			echo "<h2> Colleges with the highest percentage of male students </h2>";
			echo "<table>";
			echo "<tr><td><b> Institutions </b></td><td><b> Percentage of Male Students </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}

	}

	class endowment{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, salaries.salary FROM dept_manager
				LEFT JOIN salaries ON dept_manager.emp_no=salaries.emp_no, departments WHERE 
				departments.dept_no=dept_manager.dept_no AND salaries.to_date=\'9999-01-01\' ORDER BY
				salaries.salary DESC LIMIT 10;');

			echo "<h2> Colleges with the largest endowment overall </h2>";
			echo "<table>";
			echo "<tr><td><b> Institution </b></td><td><b> Endowment </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}

	}

	class freshmen{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT *  FROM departments limit 10;');

			echo "<h2> Colleges with the largest enrollment of freshmen </h2>";
			echo "<table>";
			echo "<tr><td><b> Institution </b></td><td><b> Freshmen Enrollment </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}
	}

	class hituitrev{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, dept_manager.emp_no, employees.first_name, employees.last_name
				FROM departments, dept_manager LEFT JOIN employees ON dept_manager.emp_no=employees.emp_no WHERE 
				departments.dept_no=dept_manager.dept_no AND dept_manager.to_date=\'9999-01-01\';');

			echo "<h2> Colleges with the highest revenue from tuition</h2>";
			echo "<table>";
			echo "<tr><td><b> Institution </b></td><td><b> Revenue from Tuition </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><</tr>";
			}
			echo "</table>";
		}

	}

	class lotuitrev{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM dept_emp
				LEFT JOIN dept_manager ON dept_emp.emp_no=dept_manager.emp_no, employees, salaries WHERE
				dept_emp.emp_no=employees.emp_no AND dept_emp.emp_no=salaries.emp_no AND dept_manager.emp_no IS NULL AND
				dept_emp.to_date=\'9999-01-01\' ORDER BY salaries.salary DESC LIMIT 10;');

			echo "<h2> Colleges with the lowest non-zero tuition revenue </h2>";
			echo "<table>";
			echo "<tr><td><b> Institution </b></td><td><b> Revenue from Tuition </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}

	}

	class region{

		function __construct(){
			global $db;

			if(isset($_POST['ready'])){


				echo "<h2> Top 10 Colleges for Select Statistics in the ".$_POST['regionpick']." Region: </h2>";

				echo "<table id='list1'>";

				echo "<tr> <td>1";

					$qry = $db->query('SELECT salaries.salary FROM salaries WHERE salaries.emp_no =\'regionpick\' LIMIT 10;');

					echo "<h2> Colleges with the highest percentage of female students </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Percentage of Female Students </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td>2";


				echo "</td> <td>3";


				echo "</td> </tr>";

				echo "<tr> <td>4</td> <td>5</td> <td></td> </tr>";

				echo "</table>";

				
			} else {

				echo "<h2> Top 10 Colleges by Region for Select Statistics </h2>";
				$qry = $db->query("SELECT emp_no FROM employees LIMIT 10;");

				echo "<table id='list1'><tr><td>Please select a region to display:</td></tr><tr><td>";
				echo "<form method=\"POST\">";

					echo "Region: <select name=\"regionpick\">";
					while($row = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<option value='".$row['emp_no']."'>".$row['emp_no']."</option>";
					}
					echo "</select><input type=\"submit\" value=\"select\">
					<input name=\"ready\" type=\"hidden\" value=\"true\"></form></td></tr></table>";

			}
		}
	}
?>
