<html>
	<head>
		<title>MySQL Queries</title>
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

	echo "<h2> David O'Grady IS218 HW3 MySQL Queries</h2>";
	echo "<h2> Please select a question below or insert or edit entry:</h2>";
	echo '<table id="list1">';
	echo '<tr><th><a href="?page=page1"> Who is the highest paid employee?</a></th></tr>';
	echo '<tr><th><a href="?page=page2"> Who is the highest paid employee between 1985 and 1981?</a></th></tr>';
	echo '<tr><th><a href="?page=page3"> Which department currently has highest paid department manager?</a></th></tr>';
	echo '<tr><th><a href="?page=page4"> What are the titles of all the departments?</a></th></tr>';
	echo '<tr><th><a href="?page=page5"> Who are the current department heads?</a></th></tr>';
	echo '<tr><th><a href="?page=page6"> Who is highest paid employee that is not a department head?</a></th></tr>';
	echo '<tr><th><a href="?page=page7"> Who is currently the lowest paid employee?</a></th></tr>';
	echo '<tr><th><a href="?page=page8"> How many employees currently work in each department?</a></th></tr>';
	echo '<tr><th><a href="?page=page9"> How much does each department currently spend on salaries?</a></th></tr>';
	echo '<tr><th><a href="?page=page10"> How much is currently spent for all salaries?</a></th></tr>';
	echo '<tr><th><a href="?page=pageinsert">Insert entry.</a></th></tr>';
	echo '<tr><th><a href="?page=pageupdate">Update entry.</a></th></tr>';
	echo "</table>";
	}
?>

</body>
</html>
