<?php
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

if(is_admin()){
    $singlepay = $_POST['singlepay'];
    $result = mysql_query("UPDATE config SET singlepay = $singlepay;") 
    or die(mysql_error());
    header( 'Location: /server.php' );
}else{
    echo "Access Denied.";
}

?>
