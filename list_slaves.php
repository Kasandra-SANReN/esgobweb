<!DOCTYPE html>

<html lang="en">
<head>
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">



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
include('header.inc.php');

//session_start();
$id= $_SESSION["Id"]; 
//echo "You are logged as " . $_SESSION["Name"] . ".<br>";

$data = simple_get('domains.slaves.list');

if (!is_object($data)) {
	echo('<div class="alert alert-danger" role="alert">Webservice call did not return response</div>');
} else if (!$data->domains || count($data->domains) < 1) {
	echo('<div class="alert alert-warning" role="alert">No slave zones found</div>');
} else {
	//echo('Please see slavelists table');
        echo('<table class="table table-striped">');
	echo('<thead>');
	echo('<tr>');
	echo('<th>Domain</th>');
	echo('<th>Type</th>');
	echo('<th>Master IP</th>');
	echo('<th>Action</th>');
	echo('</tr>');
	echo('</thead>');
        
                       
        mysqli_query($Conn, "TRUNCATE `slaveslist`");
	foreach ($data->domains as $domain) {
                
		mysqli_query($Conn, "INSERT INTO `slaveslist` (`Slavelist_id`,`Domain`,`Type`,`Masterip`,`Action`) VALUES ('','$domain->domain','$domain->type','$domain->masterip','')");
        }
  
  
   

                 $query2 = mysqli_query($Conn, "SELECT * FROM dnsentries WHERE (`owner_id`=$id)");
                 $num_rows1 = mysqli_num_rows($query2);
                 if($num_rows1 =! 0){
                while($person = mysqli_fetch_assoc($query2)){
      //echo "<h3>" . $person['Name']. "</h3>";
     // echo "<p>".$person['Institution']. "</p>";

     //   $query = mysqli_query($Conn, "Select * FROM people");
     //   $num_rows = mysqli_num_rows($query);
     //    $options='';
          
     //    while($num_rows=mysqli_fetch_array($query)) {    
  //} 
                echo('<tr>');
		echo('<td>');
                $chosend= $person['domain'];
                echo $chosend;//echo $chosendomain;
                //echo htmlentities($domain->domain);
		echo('</td>');
		echo('<td>');
		echo 'slave';    //hardcoded - this is wrong
                //htmlentities($domain->type);
		echo('</td>');
		echo('<td>');
                $chosenip= $person['masterip'];
                echo $chosenip;
                
		//echo htmlentities($domain->masterip);
		echo('</td>');
		echo('<td><a href="soa.php?'.$chosend.'=');
                echo('&domain=');
		echo urlencode($chosend);
                //echo "<script> $("a.tooltipLink").tooltip();</script>";
               	echo('"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span></a>&nbsp;<a href="force_transfer.php?'.$chosend.'=');
		echo('&domain=');
                echo urlencode($chosend);
		echo('"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></a></span>&nbsp;<a href="update_master.php?'.$chosend.'=');
		echo('&domain=');
                echo urlencode($chosend);
		echo('&masterip=');
		echo urlencode($chosenip);
		echo('"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>&nbsp;<a href="del_slave.php?'.$chosend.'=');
		echo('&domain=');
                echo urlencode($chosend);
		echo('"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>');
		echo('</tr>');
                 }
                
                    
                } else {
                    echo "No domains have been added to your account";
                 }
	echo('</table>');
}


//include('footer.inc.php');
?>

