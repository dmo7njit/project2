<?php

	class women{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT INSTNM, (EFTOTLW/EFTOTLT) FROM COLLEGE_INFO LEFT JOIN ENROLLMENT_INFO 
				ON COLLEGE_INFO.UNITID = ENROLLMENT_INFO.UNITID ORDER BY (EFTOTLW/EFTOTLT) DESC LIMIT 10;');

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

			$qry = $db->query('SELECT INSTNM, (EFTOTLM/EFTOTLT) FROM COLLEGE_INFO LEFT JOIN ENROLLMENT_INFO 
				ON COLLEGE_INFO.UNITID = ENROLLMENT_INFO.UNITID ORDER BY (EFTOTLM/EFTOTLT) DESC LIMIT 10;');

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

			$qry = $db->query('SELECT INSTNM, F1H02 FROM COLLEGE_INFO LEFT JOIN FINANCES_INFO 
				ON COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID ORDER BY F1H02 DESC LIMIT 10;');

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

			$qry = $db->query('SELECT INSTNM, EFTOTLT FROM COLLEGE_INFO LEFT JOIN ENROLLMENT_INFO
				ON COLLEGE_INFO.UNITID = ENROLLMENT_INFO.UNITID ORDER BY EFTOTLT DESC LIMIT 10;');

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

			$qry = $db->query('SELECT INSTNM, F1B01 FROM COLLEGE_INFO LEFT JOIN FINANCES_INFO
				ON COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID ORDER BY F1B01 DESC LIMIT 10;');

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

			$qry = $db->query('SELECT INSTNM, F1B01 FROM COLLEGE_INFO LEFT JOIN FINANCES_INFO
				ON COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID WHERE F1B01>0 ORDER BY F1B01 ASC LIMIT 10;');

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

				echo "<tr> <td>";

					$qry = $db->query('SELECT INSTNM, F1H02 FROM COLLEGE_INFO LEFT JOIN FINANCES_INFO
						ON COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID WHERE OBERG = $regionpick ORDER BY F1H02 DESC LIMIT 10;');

					echo "<h2> Endowment </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Endowment </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td>";

					$qry = $db->query('SELECT INSTNM, F1A01 FROM COLLEGE_INFO LEFT JOIN FINANCES_INFO
						ON COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID WHERE OBERG = $regionpick ORDER BY F1A01 DESC LIMIT 10;');

					echo "<h2> Total Current Assets </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Current Assets </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td>";

					$qry = $db->query('SELECT INSTNM, F1A09 FROM COLLEGE_INFO LEFT JOIN FINANCES_INFO
						ON COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID WHERE OBERG = $regionpick ORDER BY F1A09 DESC LIMIT 10;');

					echo "<h2> Total Current Liabilities </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Current Liabilities </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> </tr>";

				echo "<tr> <td>";

					$qry = $db->query('SELECT INSTNM, (F1B01/EFTOTLT) FROM COLLEGE_INFO, ENROLLMENT_INFO, FINANCES_INFO
						WHERE COLLEGE_INFO.UNITID = ENROLLMENT_INFO.UNITID AND COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID
						AND OBERG = $regionpick AND F1B01 > 0 ORDER BY (F1B01/EFTOTLT) LIMIT 10;');

					echo "<h2> Lowest Non-Zero Tuition </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Tuition </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td>5"; 

					$qry = $db->query('SELECT INSTNM, (F1B01/EFTOTLT) FROM COLLEGE_INFO, ENROLLMENT_INFO, FINANCES_INFO
						WHERE COLLEGE_INFO.UNITID = ENROLLMENT_INFO.UNITID AND COLLEGE_INFO.UNITID = FINANCES_INFO.UNITID
						AND OBERG = $regionpick ORDER BY (F1B01/EFTOTLT) DESC LIMIT 10;');

					echo "<h2> Highest Tuition </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Percentage of Female Students </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td></td> </tr>";

				echo "</table>";

				
			} else {

				echo "<h2> Top 10 Colleges by Region for Select Statistics </h2>";
				
				echo "<table id='list1'><tr><td>Please select a region to display:</td></tr><tr><td>";
				echo "<form method=\"POST\">";

					echo "Region: <select name=\"regionpick\">";
					
						echo "<option value='0'>"Us Service Schools"</option>";
						echo "<option value='1'>"`New` England"</option>";

					
					echo "</select><input type=\"submit\" value=\"select\">
					<input name=\"ready\" type=\"hidden\" value=\"true\"></form></td></tr></table>";

			}
		}
	}
?>
