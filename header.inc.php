<pre>
<?php

session_start();

echo "You are logged as " . $_SESSION["Name"] . ".<br>";


    /*
Copyright (C) 2015  Volker Janzen

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/
?>
<a href="users_1.php">Logout</a>
</pre>



<!DOCTYPE html>
<html lang="en">
    
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Esgob client</title>

    <!-- Bootstrap -->
 <!--   <link href="localhost/esgobweb-master/bootstrap-3.3.5-dist/js/bootstrap.min.css" rel="stylesheet"> 

 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
            <br><br>
             <img src="sanrenlogo.png" alt='Sanren logo'  style="width:200px;height:68px;">
             <img src="tenetlogo.png" alt='Tenet logo'  style="width:200px;height:68px;" align="right"> 
             <br><br>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Esgob client</a>
                                         
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="new_slave.php">New slave</a></li>
						<li><a href="list_slaves.php">Slave zones</a></li>
                                                <li><a href="del_slave.php">Delete slave zones</a></li>
                                                <li><a href="configuration.php">Configuration</a></li>
                                                
					</ul>
                                 
                                        
                                    
				</div>
                                
			</div>
		</nav>

            
            