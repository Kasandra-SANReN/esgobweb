
<!DOCTYPE html>
<?php session_start();?>

<html>
 
 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<title>User Login</title>

</head>

<body>
    <div class="container">
        <br> 
<img src="sanrenlogo.png" alt='Sanren logo'  style="width:200px;height:68px;" align="left">
             <img src="tenetlogo.png" alt='Tenet logo'  style="width:200px;height:68px;" align="right">             
             <br><br>   
              <br><br> 
<div class="jumbotron">
                <p>Welcome to the</p>
		<h1>SA NREN DNS Secondary Anycast Service</h1>
		<p>This software provides a client for the Esgob webservice and is not afiliated with Esgob Ltd.</p>
	</div>    
    <div class="jumbotron">
<form action="users_1.php" method="post">

<table width="500" align="center" >

<tr align="center">

<td colspan="3"><h2>User Login</h2></td>

</tr>

<tr>

<td align="right"><b>Name:</b></td>

<!--<td><input type="text" name="name" required="required"/></td> -->

<!--<td><form action="users.php" method="POST"> -->
<td>   <select name="name" >
            <option value=""> Select </option>
            <?php echo get_options() ?>
        </select>
  <!--  <form> -->
</td>
</tr>

<tr>

    <td align="right"><b>Password:</b></td>

<td><input type="password" name="pass" required="required"></td>

</tr>

<tr align="center">

<td colspan="3">

<input type="submit" name="login" value="Login"/>

</td>

</tr>

</table>

</form>
        <div>

<?php
//include ('config.inc.php');
//$id ='';
// establishing the MySQLi connection

function get_options()
    {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dberror1 = 'Could not connect to your database';
    $dberror2 = 'Could not find your table' ;
    //$dberror3 = 'error';
            
    $Conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die($dberror1);
    mysqli_select_db($Conn, 'dnsdatabase') or die($dberror2);
        $query = mysqli_query($Conn, "Select * FROM people");
        $num_rows = mysqli_num_rows($query);
         $options='';
          
         while($num_rows=mysqli_fetch_array($query)) {      
            $options.="<option value='".$num_rows['Name']."'>".$num_rows['Name']."</option>"; 
    }
    return $options;
    }
   
    //Link name to id
    if(isset($_POST['name']))
   {
       $name= $_POST['name'];
     echo $name;
        $dbhost = 'localhost';
  $dbuser = 'root';
   $dbpass = '';
    $dberror1 = 'Could not connect to your database';
    $dberror2 = 'Could not find your table' ;
   $dberror3 = 'error';
   
            
    $Conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die($dberror1);
    mysqli_select_db($Conn, 'dnsdatabase') or die($dberror2);
       $query = mysqli_query($Conn,"SELECT owner_id FROM people WHERE Name = '$name'" );
        

       while($person = mysqli_fetch_assoc($query)){
  //    echo "<h3>" . $person['Name']. "</h3>";
      //echo "<p>".$person['owner_id']. "</p>";
      $id = $person['owner_id'];
      echo $id;
      
       }
        
 //      $query->fetch_row();
 //      echo $row[0];
       //echo urlencode($query->id);
     //  $result= mysqli_fetch_array($query);
      // echo $query;
      // var_dump($query);
       
  } 

$con = mysqli_connect("localhost","root","","dnsdatabase");

if (mysqli_connect_errno())

{

echo "MySQLi Connection was not established: " . mysqli_connect_error();

}

// checking the user

if(isset($_POST['login'])){

$name = mysqli_real_escape_string($con,$_POST['name']);

$pass = mysqli_real_escape_string($con,$_POST['pass']);

$sel_user = "select * from people where Name='$name' AND password='$pass'";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);

if($check_user>0){

$_SESSION['Name']=$name;
$_SESSION['Id']=$id;

header("Location: http://localhost/esgobweb-master/index.php"); /* Redirect browser */


exit();
//Redirect to index.php 

}

else {

echo "<script>alert('Name or password is not correct, try again!')</script>";

}

}

?>

 



