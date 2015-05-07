<?php

	class page1{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM salaries
				LEFT JOIN employees ON salaries.emp_no=employees.emp_no ORDER BY salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td><b> First Name </b></td><td><b> Last Name </b></td><td><b> Salary </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td></tr>";
			}
			echo "</table>";
		}

	}

	class page2{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM salaries
				LEFT JOIN employees ON salaries.emp_no=employees.emp_no WHERE salaries.from_date>=\'1981-01-01\' AND 
				salaries.to_date<=\'1985-12-31\' ORDER BY salaries.salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td><b> First Name </b></td><td><b> Last Name </b></td><td><b> Salary </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page3{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, salaries.salary FROM dept_manager
				LEFT JOIN salaries ON dept_manager.emp_no=salaries.emp_no, departments WHERE 
				departments.dept_no=dept_manager.dept_no AND salaries.to_date=\'9999-01-01\' ORDER BY
				salaries.salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td><b> Department </b></td><td><b> Salary </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page4{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT DISTINCT dept_name FROM departments;');

			echo "<table>";
			echo "<tr><td><b> Departments </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page5{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, dept_manager.emp_no, employees.first_name, employees.last_name
				FROM departments, dept_manager LEFT JOIN employees ON dept_manager.emp_no=employees.emp_no WHERE 
				departments.dept_no=dept_manager.dept_no AND dept_manager.to_date=\'9999-01-01\';');

			echo "<table>";
			echo "<tr><td><b> Departments </b></td><td><b> ID </b></td><td><b> First Name </b></td><td><b> Last Name </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td><td> $value[3] </td></tr>";
			}
			echo "</table>";
		}

	}

	class page6{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM dept_emp
				LEFT JOIN dept_manager ON dept_emp.emp_no=dept_manager.emp_no, employees, salaries WHERE
				dept_emp.emp_no=employees.emp_no AND dept_emp.emp_no=salaries.emp_no AND dept_manager.emp_no IS NULL AND
				dept_emp.to_date=\'9999-01-01\' ORDER BY salaries.salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td><b> First Name </b></td><td><b> Last Name </b></td><td><b> Salary </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page7{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT salaries.emp_no, salaries.salary, employees.first_name, employees.last_name 
				FROM salaries LEFT JOIN employees ON salaries.emp_no=employees.emp_no WHERE 
				salaries.to_date=\'9999-01-01\' order by salaries.salary limit 1;');

			echo "<table>";
			echo "<tr><td><b> ID </b></td><td><b> Salary </b></td><td><b> First Name </b></td><td><b> Last Name </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td><td> $value[3] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page8{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, count(dept_emp.emp_no) FROM dept_emp 
				LEFT JOIN departments ON dept_emp.dept_no=departments.dept_no WHERE to_date=\'9999-01-01\' GROUP BY dept_emp.dept_no;');

			echo "<table>";
			echo "<tr><td><b> Departments </b></td><td><b> Number of Employees </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page9{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, sum(salaries.salary) FROM salaries 
				LEFT JOIN dept_emp ON salaries.emp_no=dept_emp.emp_no, departments WHERE departments.dept_no=dept_emp.dept_no 
				AND salaries.to_date=\'9999-01-01\' GROUP BY dept_emp.dept_no;');

			echo "<table>";
			echo "<tr><td><b> Departments </b></td><td><b> Salary Expenditures </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}

	}

	class page10{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT sum(salary) FROM salaries WHERE to_date=\'9999-01-01\';');

			echo "<table>";
			echo "<tr><td><b> Total Current Expenditures </b></td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class pageinsert{
		function __construct(){
			global $db;


			echo "<h2> Insert Entry </h2>";
			echo "<table>";
			echo "<form method=\"POST\">";
			echo "<tr><th>ID</th><td><input required name=\"emp_no\" type=\"text\"></td><tr>";
			echo "<tr><th>Birthdate</th><td><input required name=\"birth\" type=\"date\"></td><tr>";
			echo "<tr><th>First Name</th><td><input required name=\"first\" type=\"text\"></td><tr>";
			echo "<tr><th>Last Name</th><td><input required name=\"last\" type=\"text\"></td><tr>";
			echo "<tr><th>Gender</th><td><input name=\"gend\" type=\"radio\" value=\"F\" checked> Female <input name=\"gend\" type=\"radio\" value=\"M\"> Male </td><tr>";
			echo "<tr><th>Hiredate</th><td><input required name=\"hire\" type=\"date\"></td><tr>";
			echo "<tr><th><input type=\"submit\" value=\"Insert\"> <input type=\"hidden\" name=\"runner\" value=\"true\"></th><td></td><tr>";
			echo "</form>";
			echo "</table>";

			if(isset($_POST['runner'])){

				$sql = "INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date)
						VALUES (:eid, :bdate, :fname, :lname, :gen, :hdate)";

				$qry = $db->prepare($sql);
			
				$qry->bindParam(':eid', $_POST['emp_no'], PDO::PARAM_STR);
				$qry->bindParam(':bdate', $_POST['birth'], PDO::PARAM_STR);
				$qry->bindParam(':fname', $_POST['first'], PDO::PARAM_STR);
				$qry->bindParam(':lname', $_POST['last'], PDO::PARAM_STR);
				$qry->bindParam(':gen', $_POST['gend'], PDO::PARAM_STR);
				$qry->bindParam(':hdate', $_POST['hire'], PDO::PARAM_STR);

				$qry->execute();

				echo "<h3>Employee was inserted.</h3>";
			}
		}
	}

	class pageupdate{
		function __construct(){
			global $db;


			if(isset($_POST['ready'])){


				if(isset($_POST['update'])){

					$sql = "UPDATE employees SET birth_date = :bdate, first_name = :fname, last_name = :lname, hire_date = :hdate WHERE emp_no= :eid";

					$qry = $db->prepare($sql);
			
					$qry->bindParam(':eid', $_POST['emp_no'], PDO::PARAM_STR);
					$qry->bindParam(':bdate', $_POST['birth'], PDO::PARAM_STR);
					$qry->bindParam(':fname', $_POST['first'], PDO::PARAM_STR);
					$qry->bindParam(':lname', $_POST['last'], PDO::PARAM_STR);
					$qry->bindParam(':hdate', $_POST['hire'], PDO::PARAM_STR);

					$qry->execute();

					echo "<table><tr><td><h3>Employee was updated.</h3></td></tr>";
					echo "<tr><td><form><input type=\"button\" value=\"Return Home\" onclick=\"window.location.href=\'localhost:8080\'\" /></form></td></tr></table>";

				} else{

					echo "<table>";
					echo "<form method=\"POST\">";
					echo "<tr><th>ID</th><td><input readonly required name=\"emp_no\" type=\"text\" value=\"".$_POST['emp_no']."\"></td><tr>";
					echo "<tr><th>Birthdate</th><td><input required name=\"birthdate\" type=\"date\" value=\"".$_POST['bdate']."\"></td><tr>";
					echo "<tr><th>First Name</th><td><input required name=\"firstname\" type=\"text\" value=\"".$_POST['fname']."\"></td><tr>";
					echo "<tr><th>Last Name</th><td><input required name=\"lastname\" type=\"text\" value=\"".$_POST['lname']."\"></td><tr>";
					echo "<tr><th>Hiredate</th><td><input required name=\"hiredate\" type=\"date\" value=\"".$_POST['hdate']."\"></td><tr>";
					echo "<tr><th><input type=\"hidden\" name=\"update\" value=\"true\"> <input type=\"hidden\" name=\"ready\" value=\"true\"> <input type=\"submit\" value=\"update\"></th><td></td><tr>";
					echo "</form>";
					echo "</table>";
				}
			} else {

				$qry = $db->query("SELECT * FROM employees LIMIT 5;");

				echo "<h2> Update Entry </h2>";

				echo "<table id='list1'><tr>";
			
				while($row = $qry->fetch(PDO::FETCH_BOTH)){
					
					echo "<td><form method=\"POST\"><table id='list2'>";
					echo "<tr><td>$row[0]</td><td>$row[3]</td><td><input type=\"submit\" value=\"select\"></td>
					<td><input name=\"emp_no\" type=\"hidden\" value=\"$row[0]\"></td> 
					<td><input name=\"bdate\" type=\"hidden\" value=\"$row[1]\"></td>
					<td><input name=\"fname\" type=\"hidden\" value=\"$row[2]\"></td>
					<td><input name=\"lname\" type=\"hidden\" value=\"$row[3]\"></td>
					<td><input name=\"hdate\" type=\"hidden\" value=\"$row[5]\"></td>
					<td><input name=\"ready\" type=\"hidden\" value=\"true\"></td></tr></table></form></td>";


				}
				echo "<tr></table>";
			
			}
		}
	}
?>
