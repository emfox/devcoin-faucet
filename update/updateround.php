<?
/**
 * @author Greedi
 * @copyright 2012
 */
include('../core/wallet.php');

$round = $_POST['round'];

    $result = mysql_query("UPDATE config SET round = $round") 
    or die(mysql_error());
    
    header( 'Location: http://d.evco.in/faucet/server.php' ) ;  
?>

