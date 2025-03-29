<?php
/**
 * @copyright Greedi 2012, Emfox Zhou 2013-2018
 */
include ('core/banned.php');
include ('core/wallet.php');
include ('templates/header.php');
//include ('core/dnsbl.php');

?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <div class="row">
        <div class="col-sm-8">
          <h1>The Devcoin Faucet</h1>
          <ul>
            <li>NEW!!Input your BitcoinTalk.org Member ID to get more DVCs! you should refer to <a href="https://bitcointalk.org/index.php?topic=191553.msg1983573" target="_blank">this thread</a> first</li>
            <li>To reduce transcation fees, payout will happen when there are enough people submitted. Now the number is 30.</li>
            <li>You can only submit once per round, if we detect the same IP or a proxy, you'll not be paid.</li>
            <li>If you need more devcoins, you could buy more via <a href="https://www.altilly.com/referral/f49b6">www.altilly.com</a>, use <a href="https://www.altilly.com/referral/f49b6" target="_blank">our sponsored link to signup</a> to have fee reduced.</li>
          </ul>
          <form class="form-horizontal" action="submitted.php" method="post">
            <div class="form-group">
              <label class="col-sm-4"><font color="green">Your Devcoin Address</font></label>
              <div class="col-sm-8"><input type="text" class="form-control" name="DVC"></div>
            </div>
            <div class="form-group">
              <label class="col-sm-4"><font color="green">BitcoinTalk.org Member ID</font></label>
              <div class="col-sm-8"><input type="text" class="form-control" name="BTorg" title="Input your BitcoinTalk.org Member ID to get more DVCs! you should refer to https://bitcointalk.org/index.php?topic=191553.msg1983573 first" placeholder="e.g. 12345. optional"></div>
            </div>
            <div class="form-group">
              <div class="col-sm-8 col-sm-offset-4">
                <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_key; ?>"></div>
                <input type="submit" class="btn btn-default" value="Submit">
              </div>
            </div>
          </form>
        </div>
<?php
include ("templates/sidebar.php");
include ('templates/footer.php');
?>

