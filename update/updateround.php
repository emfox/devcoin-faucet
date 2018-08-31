<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $round = $_POST['round'];

    $result = mysql_query("UPDATE config SET round = $round") 
    or die(mysql_error());
    
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>

