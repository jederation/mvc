<!DOCTYPE html>

<html>
    <head>
        <title>home</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    	<link type="text/css" rel="stylesheet" href="css/style.css"/>
    
    </head>
    <body>


<?php
session_start();

mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db ('mvc') or die(mysql_error());

/*connect to database*/
if(!isset($_SESSION['USERID'])){
    header('location:index.php');
} 

if(isset($_POST['logout'])){

	/*new*/
	$time = date("Y-m-d H:i:s");
	$id = $_SESSION['USERID'];

	$query = "UPDATE tblLogbook SET Logout='$time' WHERE UserID=$id AND Logout IS NULL";
	$result = mysql_query($query);

	if(!$result)
		echo mysql_error(); 
	/*new*/

    session_destroy();
    header('location:index.php');
}
?>

<div id="header"><h1>Welcome!</h1>
<div class = "content">
<form action='#' method='Post'>
        
        <input type='submit' name='logout' value='logout'>
</form>
</div>
</div>



<?php

$id=$_GET['id'];

if ($id == 1){
	echo "<a href=\"logbook.php\">Visit log book</a>";
}

/*assigned an specific id for the admin*/			
?>

<!--<div class="mid">
<a href = "logbook.php"><h2>Visit log book</h2><a>
</div>-->

    </body>
</html>