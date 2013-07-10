<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

mysql_connect('localhost', 'root', '') or die (mysql_error());
mysql_select_db('mvc') or die (mysql_error());



$query = "SELECT logbook.ID, logbook.login, logbook.logout, tblusers.UserName

FROM tblusers, logbook 

WHERE tblusers.ID = logbook.UserID 

ORDER BY logbook.login";

$result = mysql_query($query);



?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>logbook</title>

<link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>
<body>

<div id="header"><h1>User Logs</h1></div>


<div class="wrap">
<!--<table style="border:#090 5px solid">-->
<table border="4" cellpadding="2" cellspacing="2" width="50%" style="border:#090 5px solid">
<tr>
	<th>Username</th>
    <th>Login</th>
	<th>Logout</th>
<tr>


<?php
if($result):

while ($row = mysql_fetch_assoc($result))
{
	/*?>
	
<div id="table">

<div id="t1">Username<?php echo $row["UserName"]?></div>

<div id="t2">Login<?php echo $row["login"]?></div>

<div id="t3">Logout<?php echo $row["logout"]?></div>

</div>
    
<?php */    

echo "<tr>";

echo "<td>" . $row["UserName"] . "</td>";
echo "<td>" . $row["login"] . "</td>";
echo "<td>" . $row["logout"] . "</td>";

echo "</tr>";


}
endif;



?>

</table>
</div>

</body>
</html>