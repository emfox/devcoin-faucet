<?php
// LTC WALLET
session_start();
require_once __DIR__ . '/functions.php';
$start = timer();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../vendor/soundasleep/jsonrpcclient/includes/jsonRPCClient.php';
// init

$btclient = new jsonRPCClient("http://". $btclogin["username"] . ':' . $btclogin["password"] . '@' .$btclogin["host"] . ':' . $btclogin["port"]);
$info_blockchain = $btclient->getblockchaininfo();
$info_network = $btclient->getnetworkinfo();
$info_wallet = $btclient->getwalletinfo();

//$this->PDO_Conn = new PDO("mysql:host={$sqllogin['host']};dbname={$sqllogin['dbname']}", $sqllogin['username'], $sqllogin['password']);
$dbconn = mysqli_connect($sqlogin['host'],$sqlogin['username'],$sqlogin['password']);
mysqli_select_db($dbconn,$sqlogin['dbname']);

// time for pages ..




?>
