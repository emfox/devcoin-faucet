<div class="span4"> <!-- This is the sidebar, don't forget -_- -->
<?php
include ('core/daily.php');
echo '
            <div style="margin-right: 10px;">
            <h3><center>Faucet statistics</center></h3>
            <table class="zebra-striped">
<tr><td>Current Round: </td><td>' . $round . ' </td></tr>
   <tr><td>Submitted This Round: </td><td>' . $rows . ' persons</td></tr>
<tr><td>Payout per Person: </td><td>' . $singlepay . ' DVC</td></tr> 
            <tr><td>Total Paid: </td><td>' . $totalpay . ' DVC</td></tr>
</table>';
?>

<center>
<p>Future Ads here.</p>

<br>
</center></div>

<iframe scrolling="no" style="border: 0; width: 200px; height: 200px;" src="http://coinurl.com/get.php?id=10911"></iframe>
