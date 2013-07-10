<!DOCTYPE html>



<?php

//keeps the users from accessing the home without logging in
session_start();



// for database connection    

//mysql_connect('sever', 'user', '[password left blank]') or die (mysql_error()); mysql_select_db('mvc') or die (mysql_error());


mysql_connect('localhost', 'root', '') or die (mysql_error());
mysql_select_db('mvc') or die (mysql_error());


//responses

if(isset($_POST['submit'])) { 
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    echo 
    
    //this will search the database for the list of usernames and passwords
    
    $query = "SELECT * FROM tblusers WHERE
            UserName = '$username' AND
            Password = '$password'";  
    
    //this will connect to the ACCOUNTS from the database
	
	$result = mysql_query($query); 
    if($result){
        /*$num_rows = mysql_num_rows($result);        
              if($num_rows > 0){
                $row = mysql_fetch_array($result);
                $_SESSION['USERID'] = $row['ID'];
				$id = $_SESSION['USERID'];
				$date = date("Y-m-d H:i:s");
				
				$query = "INSERT INTO logbook VALUES(NULL, $id, $date, NULL)";
				$result = mysql_query($query);
				
                header('location: home.php');
            }*/
			
			$num_rows = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			$id = $row['ID']; 
			$date = date("Y-m-d H:i:s");
			$update = "UPDATE logbook SET Login='$date' WHERE ID='$id'";
			mysql_query($update);
	
			$query = "INSERT INTO logbook VALUES(NULL,$id,'$date',NULL)";
			$result = mysql_query($query);
			if(!$result)
				echo mysql_error();

			$_SESSION['USERID'] = $row['ID'];
			
			header('location:home.php?id='.$id);
			}
	
	/*else{
        echo"no match found!"; //if the given account does not exist
    }*/
}
   
?>


<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    	<link type="text/css" rel="stylesheet" href="css/style.css"/>
    
    </head>
    <body>
        
        <div id="header"><h1>Jederation PHP</h1></div>
        
        
        <div class="wrapper">
        <div class="log">           
        <form method='POST' action='#'>
           
           	<div class="box">
            Username:
            <input type='text' name='username'></div>
            
            <div class="box">
            Password:
            <input class="box" type='password' name='password'></div>
            
            <div class="box">
            <input class="box" type='submit' name='submit' value='login'></div>

        
        </form>
        
        		
        </div>
        
        <div class="reg">
				<a href="#"><h2>SIGN UP<h2><a>
				</div>
        </div>    
        
    </body>
</html>