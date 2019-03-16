<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $dailytotal = $_POST['delete'];
    mysqli_query($dbconn,"DELETE FROM dailyltc") 
    or die(mysqli_error($dbconn));
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>


