<?
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

$dailytotal = $_POST['delete'];

    mysql_query("DELETE FROM dailyltc") 
    or die(mysql_error());
    
    header( 'Location: http://d.evco.in/faucet/server.php' ) ;  
?>


