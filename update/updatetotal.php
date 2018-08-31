<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $totalpay = $_POST['totalpay'];
    mysql_query("UPDATE config SET totalpay = $totalpay") 
    or die(mysql_error());
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>


