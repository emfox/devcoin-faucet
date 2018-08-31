<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $dailytotal = $_POST['delete'];
    mysql_query("DELETE FROM dailyltc") 
    or die(mysql_error());
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>


