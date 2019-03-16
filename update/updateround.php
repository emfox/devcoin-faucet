<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $round = $_POST['round'];

    $result = mysqli_query($dbconn,"UPDATE config SET round = $round") 
    or die(mysqli_error($dbconn));
    
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>

