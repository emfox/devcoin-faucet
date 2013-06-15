<?
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

$totalpay = $_POST['totalpay'];

    mysql_query("UPDATE config SET totalpay = $totalpay") 
    or die(mysql_error());
    
  header( 'Location: http://d.evco.in/faucet/server.php' ) ; 
?>


