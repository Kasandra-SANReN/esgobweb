

<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dberror1 = 'Could not connect to your database';
    $dberror2 = 'Could not find your table' ;
    $dberror3 = 'error';
            
    $Conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die($dberror1);
    mysqli_select_db($Conn, 'dnsdatabase') or die($dberror2);
    
    
?>


