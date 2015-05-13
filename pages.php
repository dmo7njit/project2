<?php

	class women{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT distinct INSTNM, round(((EFTOTLW/EFTOTLT)*100),2) FROM college_info, enrollment_info 
				where college_info.UNITID = enrollment_info.UNITID and EFALEVEL = 1 ORDER BY (EFTOTLW/EFTOTLT) DESC LIMIT 10;');

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

			$qry = $db->query('SELECT distinct INSTNM, round(((EFTOTLM/EFTOTLT)*100),2) FROM college_info, enrollment_info 
				WHERE college_info.UNITID = enrollment_info.UNITID AND EFALEVEL = 1 ORDER BY (EFTOTLM/EFTOTLT) DESC LIMIT 10;');

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

			$qry = $db->query('SELECT distinct INSTNM, F1H02 FROM college_info, finances_info 
				WHERE college_info.UNITID = finances_info.UNITID ORDER BY F1H02 DESC LIMIT 10;');

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

			$qry = $db->query('SELECT distinct INSTNM, EFTOTLT FROM college_info, enrollment_info
				WHERE college_info.UNITID = enrollment_info.UNITID AND EFALEVEL = 4 ORDER BY EFTOTLT DESC LIMIT 10;');

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

			$qry = $db->query('SELECT distinct INSTNM, F1B01 FROM college_info, finances_info
				WHERE college_info.UNITID = finances_info.UNITID ORDER BY F1B01 DESC LIMIT 10;');

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

			$qry = $db->query('SELECT distinct INSTNM, F1B01 FROM college_info, finances_info
				WHERE college_info.UNITID = finances_info.UNITID AND F1B01>0 ORDER BY F1B01 ASC LIMIT 10;');

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

			if(isset($_REQUEST['ready'])){

				echo "<h2> Top 10 Colleges for Select Statistics in Region ".$_REQUEST['regionpick']." : </h2>";

				echo "<table id='list1'>";

				echo "<tr> <td>";

					$qry = $db->query("SELECT distinct INSTNM, F1H02 FROM college_info, finances_info where college_info.UNITID = finances_info.UNITID
						AND OBEREG = " . $_POST['regionpick'] . " ORDER BY F1H02 DESC LIMIT 10;");

					echo "<h2> Endowment </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Endowment </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td>";

					$qry = $db->query("SELECT distinct INSTNM, F1A01 FROM college_info LEFT JOIN finances_info
						ON college_info.UNITID = finances_info.UNITID WHERE OBEREG = " . $_POST['regionpick'] . " ORDER BY F1A01 DESC LIMIT 10;");

					echo "<h2> Total Current Assets </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Current Assets </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td>";

					$qry = $db->query("SELECT distinct INSTNM, F1A09 FROM college_info LEFT JOIN finances_info
						ON college_info.UNITID = finances_info.UNITID WHERE OBEREG = " . $_POST['regionpick'] . " ORDER BY F1A09 DESC LIMIT 10;");

					echo "<h2> Total Current Liabilities </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Current Liabilities </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> </tr>";

				echo "<tr> <td>";

					$qry = $db->query("SELECT distinct INSTNM, round((F1B01/EFTOTLT),2) FROM college_info, enrollment_info, finances_info
						WHERE college_info.UNITID = enrollment_info.UNITID AND college_info.UNITID = finances_info.UNITID
						AND OBEREG = " . $_POST['regionpick'] . " AND F1B01 > 0 ORDER BY (F1B01/EFTOTLT) LIMIT 10;");

					echo "<h2> Lowest Non-Zero Tuition </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Tuition </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td>"; 

					$qry = $db->query("SELECT distinct INSTNM, round((F1B01/EFTOTLT),2) FROM college_info, enrollment_info, finances_info
						WHERE college_info.UNITID = enrollment_info.UNITID AND college_info.UNITID = finances_info.UNITID
						AND OBEREG = " . $_POST['regionpick'] . " ORDER BY (F1B01/EFTOTLT) DESC LIMIT 10;");

					echo "<h2> Highest Tuition </h2>";
					echo "<table>";
					echo "<tr><td><b> Institution </b></td><td><b> Tuition </b></td></tr>";
					while($value = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
					}
					echo "</table>";

				echo "</td> <td></td> </tr>";

				echo "</table>";

				
			} else {

				echo "<h2> Top 10 Colleges by Region for Select Statistics </h2>";
				$qry = $db->query("SELECT distinct obereg from college_info order by obereg;");

				echo "<table id='list1'><tr><td>Please select a region to display:</td></tr><tr><td>";
				echo "<form method=\"POST\">";

					echo "Region: <select name=\"regionpick\">";
					while($row = $qry->fetch(PDO::FETCH_BOTH)){
						echo "<option value='".$row[0]."'>".$row[0]."</option>";
					}
					echo "</select><input type=\"submit\" value=\"Select\">
					<input name=\"ready\" type=\"hidden\" value=\"true\"></form></td></tr>";
					echo "<tr><td><p>Geographic Region Codes <br>
									0 - US Service schools <br>
									1 - Northeast CT ME MA NH RI VT <br>
									2 - Mid East DE DC MD NJ NY PA <br>
									3 - Great Lakes IL IN MI OH WI <br>
									4 - Plains IA KS MN MO NE ND SD <br>
									5 - Southeast AL AR FL GA KY LA MS NC SC TN VA WV <br>
									6 - Southwest AZ NM OK TX <br>
									7 - Rocky Mountains CO ID MT UT WY <br>
									8 - Far West AK CA HI NV OR WA <br>
									9 - Outlying areas AS FM GU MH MP PR PW VI</p></td></tr></table>";

			}
		}
	}
?>
