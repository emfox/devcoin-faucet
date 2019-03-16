<?php
function returntimer ($pagetimer) {
  // better then previous but still bit shitty assumes all pages are +10ms :)
  $timer = timer()-$pagetimer;
  if ($timer[0] == 0) {
    if (substr($timer,2,1) == 0)
    $timer = substr($timer,3,2). " ms"; // +10 ms
    else
    $timer = substr($timer,2,3). " ms"; // +100 ms
  }
  else {
    $timer = $timer."  sec";
  }
  return $timer;
}

function timer () {
  $a = explode (' ',microtime());
  return(double) $a[0] + $a[1];
}

function checkExistingIP($ip)
{
    $q = mysqli_query($dbconn,"SELECT `ip` FROM `dailyltc` WHERE `ip`='{$ip}' LIMIT 1");
    $rows = mysqli_num_rows($q);
    return $rows;
}
function is_admin()
{
  global $admin_ip;
  return in_array($_SERVER['REMOTE_ADDR'], $admin_ip);
}
function srsnot($srserror) {
  return '          <div class="alert alert-success" style="margin-right: 20px;"><p>' . $srserror . '</p></div>';
}
function srserr($srserror) {
  return '          <div class="alert alert-warning" style="margin-right: 20px;"><p>' . $srserror . '</p></div>';
}
?>
