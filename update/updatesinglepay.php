<?
/**
 * @author Greedi
 * @copyright 2012
 */
 ini_set("display_errors", 1);
include('../core/wallet.php');

$singlepay = $_POST['singlepay'];

    $result = mysql_query("UPDATE config SET singlepay = $singlepay;") 
    or die(mysql_error());
    
    header( 'Location: http://d.evco.in/faucet/server.php' ) ;  
?>


