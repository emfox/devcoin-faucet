<?
$command = "SELECT * FROM config where id = 1";
$q = mysql_query($command);
$singlepay = mysql_result($q, 0, "singlepay");
$round = mysql_result($q, 0, "round");
$totalpay = mysql_result($q, 0, "totalpay");

$dltc = mysql_query("SELECT * FROM `dailyltc`");
$rows = mysql_num_rows($dltc);

?>