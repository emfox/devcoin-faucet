<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $singlepay = $_POST['singlepay'];
    $result = mysqli_query($dbconn,"UPDATE config SET singlepay = $singlepay;") 
    or die(mysqli_error($dbconn));
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>
