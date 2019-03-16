<?php
$command = "SELECT * FROM config where id = 1";
$q = mysqli_query($dbconn,$command);
if($q && $q->num_rows)
{
    $r = $q->fetch_assoc();
    $singlepay = $r["singlepay"];
    $round = $r["round"];
    $totalpay = $r["totalpay"];
}
$dltc = mysqli_query($dbconn,"SELECT * FROM `dailyltc`");
$rows = mysqli_num_rows($dltc);

?>
