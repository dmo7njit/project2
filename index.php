<html>
	<head>
		<title>College Information</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>

<?php
	error_reporting(-1);
	ini_set('display_errors','On');

	$db = new PDO('mysql:host=localhost;dbname=employees;charset=utf8','root','jared1harry',array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	include 'pages.php';

	if(isset($_GET['page'])){
		$qry = new $_GET['page'];
	} else {

	echo "<h1>Integrated Post Secondary Educational Data System</h1>";
	echo "<h2> David O'Grady IS218 Project 2</h2>";
	echo "<h2> Please select a question below for more information:</h2>";
	echo '<table id="list1">';
	echo '<tr><th><a href="?page=women"> 1. Colleges with the highest percentage of female students</a></th></tr>';
	echo '<tr><th><a href="?page=men"> 2. Colleges with the highest percentage of male students</a></th></tr>';
	echo '<tr><th><a href="?page=endowment"> 3. Colleges with the largest endowment overall</a></th></tr>';
	echo '<tr><th><a href="?page=freshmen"> 4. Colleges with the largest enrollment of freshman</a></th></tr>';
	echo '<tr><th><a href="?page=hituitrev"> 5. Colleges with the highest revenue from tuition</a></th></tr>';
	echo '<tr><th><a href="?page=lotuitrev"> 6. Colleges with the lowest non zero tuition revenue</a></th></tr>';
	echo '<tr><th><a href="?page=region"> 7. The top 10 colleges by region for the following statistics:</a><br>
						<ol id="list3"><li> Endowment </li>
						    <li> Total Curent Assets </li>
						    <li> Total Current Liabilities </li>
						    <li> Lowest Non-Zero Tuition </li>
						    <li> Highest Tuition </li></ol></th></tr>';
	echo "</table>";
	}
?>

</body>
</html>
