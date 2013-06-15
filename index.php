<?
/**
 * @author Greedi
 * @copyright 2012
 */
include ('core/banned.php');
include ('core/wallet.php');
include ('templates/header.php');
include ('core/includes/simpl_html_dom.php');
//include ('core/dnsbl.php');

?>
        <div class="row">
          <div class="span10">
<h2>The Devcoin Faucet</h2>
<ul>
<li>NEW!!Input your BitcoinTalk.org Member ID to get more DVCs! you should refer to <a href="https://bitcointalk.org/index.php?topic=191553.msg1983573" target="_blank">this thread</a> first</li>
<li>Due to more people coming, we have increase the submits every round needed to 30.
<li>To reduce transcation fees, payout will happen when there are enough people submitted. Now the number is 30.</li>
<li>You can only submit once per round, if we detect the same IP or a proxy, you'll not be paid.</li>
<li>If you need more devcoins, you could buy more via <a href="https://vircurex.com/welcome/index?referral_id=295-8299">vircurex.com</a>, use <a href="https://vircurex.com/welcome/index?referral_id=295-8299" target="_blank">our sponsored link to signup</a> to have fee reduced.</li>
</ul>
<style>
.tdr{text-align:right;}
</style>
<center><br>
<form action="submitted.php" method="post">
<td class="tdr"><font color="green">Your Devcoin Address Here:</font></td>
<td><input type="text" name="DVC"></td><br />
<td class="tdr"><font color="green">BitcoinTalk.org Member ID:</font></td>
<td><input type="text" name="BTorg" title="Input your BitcoinTalk.org Member ID to get more DVCs! you should refer to https://bitcointalk.org/index.php?topic=191553.msg1983573 first" value="e.g. 12345. optional" onfocus="this.value='';"></td>
<?php
echo GetCaptcha($adscaptchaID, $adspubkey);
?>
<td colspan="3" align="center"><input type="submit" value="Submit"></td>
</center>
</div>
<?
include ("templates/sidebar.php");
include ('templates/footer.php');
?>

