<!DOCTYPE html>
<html lang="en">
    
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container-fluid">

   
<h3>Enter Domain name to delete</h3>
<form action="del_slave.php" method="post">
    Domain Name<input type="text" name="inputDomain" value="" /><br />
         <input type="submit" name="submit" value="Submit"/>
         <br><br>
</form>
<div>
   
<?php
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

//require_once('config.inc.php');
require_once('proxy.inc.php');
include ('connection.php');
//include('header.inc.php');
//include_once('del_slave.php');





$domain = '';
$force = 0;

if(isset($_POST['submit'])) {
$domain = $_POST['inputDomain'];
}

if (isset($_GET['domain'])) {
	$domain = $_GET['domain'];
        
}

if (isset($_GET['force'])) {
	$force = intval($_GET['force']);
}

if ($domain == '') {
	echo('<div class="alert alert-danger" role="alert">No domain name set</div>');
} else if ($force) {
	$data = simple_get('domains.slaves.delete', $domain);
	if (!is_object($data)) {
		echo('<div class="alert alert-danger" role="alert">Webservice call did not return response</div>');
	} else {
                
		echo('<div class="well">');
                
                
                mysqli_query($Conn, "DELETE FROM `dnsentries` WHERE `dnsentries`.`domain` = '$domain'");
                
                
                
		echo(htmlentities($data->action)); //domain deleted
                //header ("Location: del_slave.php"); //Refresh page here
                echo('</div>');
	}
} else {
?>



	<div class="jumbotron">
		<h1>Delete <?php echo(htmlentities($domain)); ?>?</h1>
		<p>Do you really want to delete slave zone <?php echo(htmlentities($domain)); ?>? This cannot be revoked!</p>
                <a href="del_slave.php?domain=<?php echo(urlencode($domain)); ?>&force=1" class="btn btn-danger btn-lg" role="button">Delete</a>
		<a href="list_slaves.php" class="btn btn-primary btn-lg" role="button">Abort</a>
        </div>
<?php
}
include ('list_slaves.php');
//include('footer.inc.php');
?>
