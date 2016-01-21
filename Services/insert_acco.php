<?php
require "config.php";// connection to database 

$submit = isset($_POST['submit']) ? $_POST['submit'] : '';

//form Data capture

$name = isset($_POST['name']) ? $_POST['name'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$date = date('Y-m-d');



//Insert Data
$queryreg = mysql_query("

INSERT into acco VALUES('','$name','$comment','$date')

"); 

	
header('Location: acco.php');
		
?>
<!--Submit complete -->


