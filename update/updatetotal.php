<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $totalpay = $_POST['totalpay'];
    mysqli_query($dbconn,"UPDATE config SET totalpay = $totalpay") 
    or die(mysqli_error($dbconn));
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>


