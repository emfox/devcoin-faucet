<?php
// LTC WALLET
session_start();
include("functions.php");
$start = timer();

include("config.php");
include_once ("includes/jsonRPCClient.php");
include("address.inc");
include("recaptchalib.inc");
include ("adscaptchalib.inc");

//captha
$publickey = "6LfYSssSAAAAAF2w_TeMklmv-6VWUDhcECr9rWfI";
$privatekey = "6LfYSssSAAAAAPntQz9H0twbsdyk8kQHO_F4mupD";

// init

$btclient = new jsonRPCClient("http://". $btclogin["username"] . ':' . $btclogin["password"] . '@' .$btclogin["host"] . ':' . $btclogin["port"]);
$addr = new Address($btclient,$sqlogin);
$derp = $btclient->getblockchaininfo();

//$this->PDO_Conn = new PDO("mysql:host={$sqllogin['host']};dbname={$sqllogin['dbname']}", $sqllogin['username'], $sqllogin['password']);
$dbconn = mysqli_connect($sqlogin['host'],$sqlogin['username'],$sqlogin['password']);
mysqli_select_db($dbconn,$sqlogin['dbname']);

// time for pages ..




?>
