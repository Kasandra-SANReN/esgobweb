<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  
  
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

include ('proxy.inc.php');
include('header.inc.php');
include ('connection.php');
//include ('users_1.php');

//session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $id;

?>
	<div class="jumbotron">
                <p>Welcome to the</p>
		<h1>SA NREN DNS Secondary Anycast Service</h1>
		<p>This software provides a client for the Esgob webservice and is not afiliated with Esgob Ltd.</p>
	</div>

<?php


//echo function_exists('curl_version')?'Yes':'No';


$data = simple_get('accounts.get');
//echo $data;

if (is_object($data)) {
	echo('<div class="well">Account ');
	echo "SA NREN";
        //echo(htmlentities($data->name));
	echo(' (');
	echo(htmlentities($data->id));
	echo(') has ');
	echo(htmlentities($data->credits));
	echo(' credits.');
	echo('</div>');
        echo('</br>');
} else {
	echo('<div class="alert alert-danger" role="alert">Webservice call did not return response. Please try again.</div>');
}

  
  
 //  $query1 = mysqli_query($Conn, "Select * FROM dnsentries");
  
 // $query = mysqli_query($Conn, "Select * FROM people");
  
  //$num_rows = mysqli_num_rows($query);
  
  //if($num_rows =! 0){
  
  //while($person = mysqli_fetch_assoc($query)){
  //    echo "<h3>" . $person['Name']. "</h3>";
  //    echo "<p>".$person['Institution']. "</p>";
//}
 // }  
  
  


//include('selected_change_submit.php');
?>
