<?php

/**
 * @author Greedi
 * @copyright 2012
 */
 error_reporting(E_ALL);
include ('core/banned.php');
include_once ("core/wallet.php");
include_once ('templates/header.php');
include_once ('core/includes/simpl_html_dom.php');
//include ('core/dnsbl.php');

$donaddress = $btclient->getaccountaddress($don_faucet);
$don = $btclient->getbalance($don_faucet, 0);

?>
<div class="row">
<div class="span10">
<center>
<br />
<?php
$ip = $_SERVER['REMOTE_ADDR'];
$challengeValue = $_POST['adscaptcha_challenge_field'];
$responseValue = $_POST['adscaptcha_response_field'];
$remoteAddress = $_SERVER["REMOTE_ADDR"];
function ordinal($a)
{
    $b = abs($a);
    $c = $b % 10;
    $e = (($b % 100 < 21 && $b % 100 > 4) ? 'th' : (($c < 4) ? ($c < 3) ? ($c < 2) ?
        ($c < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
    return $a . $e;
}
if (strtolower(ValidateCaptcha($adscaptchaID, $adsprivkey, $challengeValue, $responseValue,
    $remoteAddress)) == "true") {
    $isvalid = $btclient->validateaddress(trim($_POST['DVC']));
    if ($isvalid['isvalid'] != '1') {

        echo "Invalid Address: {$_POST['DVC']}";
        echo "</center></div>";
        include ('templates/sidebar.php');
        include ('templates/footer.php');
        die();
    } else {
    $address = trim($_POST['DVC']);
    $bt_id = filter_var($_POST['BTorg'], FILTER_SANITIZE_NUMBER_INT);

    if($bt_id!=''){

echo "Bitcointalk.org id processing:<br>";
$bt_profile=file_get_html("https://bitcointalk.org/index.php?action=profile;u=" . $bt_id);
$not_new=false;
foreach($bt_profile->find('div[id=bodyarea] td') as $temp_text)
{
  if($temp_text->plaintext=="Position: ")
  {
  $bt_position=$temp_text->next_sibling();
  $not_new = strpos($bt_position,"Member");
  break;
  }
}

if($not_new!==false)
{
  $bt_sig=$bt_profile->find('div[class=signature]',0);
  $has_devtome = strpos($bt_sig,"devtome.com");
  if($has_devtome !== false){
    $has_address = strpos($bt_sig,$address);
    if($has_address !== false){
      $next_pay_time=time()+(144+rand(0,48))*3600;
      mysql_query("insert into bitcointalk (uid, status,address,next_date)
                   select '$bt_id', '1', '$address','$next_pay_time' from dual
                   where not exists (select * from bitcointalk where uid=$bt_id)") or die(mysql_error());
      $btclient->sendfrom("FaucetDonations",$address,50);
      echo "We have successfully paid you 50 DVCs out, another 100 DVCs will be at about a week later.";
    }else{
      echo "Error: You should write your devcoin address to your signature.";
    }
  }else{
    echo "Error: You should add devtome promotion to your signature!";
  }
}else{
echo "Error: Invalid id or your bitcointalk account is too new!";
}
echo "<br><br><br>";
    }

    $cur_time=time();
    $coins_in_account = $btclient->getbalance("FaucetDonations", 0);
    $list = mysql_query("SELECT * FROM bitcointalk where status = 1 and next_date < '$cur_time'");
    $paynum = mysql_num_rows($list);
    if($paynum > 0 and $coins_in_account >= 100*$paynum){
      $addr_list = array();
      while ($listw = mysql_fetch_array($list)) {
	if(strpos(file_get_html("https://bitcointalk.org/index.php?action=profile;u=" . $listw['uid']),"devtome.com")!==false){
	  $addr_list[$listw['address']] = 100;
	}else{
	  mysql_query("update bitcointalk set status=3 where uid=" . $listw['uid']);
	}
      }
      $btclient->sendmany("FaucetDonations", $addr_list);
      mysql_query("update bitcointalk set status=2 where status = 1 and next_date < '$cur_time'");
    }

            mysql_query("INSERT INTO dailyltc (ltcaddress, ip)
    SELECT * FROM (SELECT '$address', '$ip') AS tmp
    WHERE NOT EXISTS (
    SELECT ip FROM dailyltc WHERE ip = '$ip'
    ) LIMIT 1;") or die(mysql_error());

            mysql_query("INSERT INTO subtotal (ltcaddress, ip) VALUES('$address', '$ip' ) ") or
                die(mysql_error());
            $command = "SELECT * FROM dailyltc";
            $q = mysql_query($command);
            $rows = mysql_num_rows($q);
            $entries_needed = 30;
            if ($rows >= $entries_needed) {
                $command = "SELECT * FROM config";
                $q = mysql_query($command);
                $res = mysql_fetch_array($q);
                $list = mysql_query("SELECT * FROM dailyltc");

                $coins_in_account = $btclient->getbalance("FaucetDonations", 0);
                if ($coins_in_account >= ($res['singlepay'] * $rows)) {
		    $addr_list = array();
                    while ($listw = mysql_fetch_array($list)) {
		      $addr_list[$listw['ltcaddress']] = doubleval($res['singlepay']);
                    }
		    $btclient->sendmany("FaucetDonations", $addr_list);
                    $n = ordinal(mysql_num_rows($list));
                    echo srsnot("Congratulations, you were the {$n} in the round, the round has been reset and payouts have been sent.");
                    mysql_query("TRUNCATE dailyltc");
                    mysql_query("UPDATE config set round=round+1");
                    $totalc = $res['singlepay'] * $rows;
                    mysql_query("UPDATE config set totalpay=totalpay+{$totalc}");
                    echo "</center></div>";
                    include ('templates/sidebar.php');
                    include ('templates/footer.php');
                    die();
                } else {
                    echo srserr("Uh oh, looks like we haven't got enough donations to pay out. The round will continue until there's enough to pay out.");
                    echo "</center></div>";
                    include ('templates/sidebar.php');
                    include ('templates/footer.php');
                    die();
                }
            }

            //echo "printan.";

            //echo "printed.";
            // echo "</table>";
            echo "You will get your DVC at the end of this round<br />There are $rows submitted addresses in this round!<br>";
            echo "<br>If you want to donate to the Faucet: $donaddress (recv: $don)";
        }
    
} else { // Wrong answer, you may display a new AdsCaptcha and add an error message
    echo srserr("INVALID CAPTCHA. <a href='index.php'>Go back</a>");
}
?>
</center>
</div>
<?php
include ('templates/sidebar.php');
include ('templates/footer.php');
?>




